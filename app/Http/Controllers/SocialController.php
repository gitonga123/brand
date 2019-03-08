<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Redirect, Response, File;
use Socialite;
use App\User;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {

        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo, $provider);

        auth()->login($user);

        return redirect()->to('/home');

    }

    private function createUser($getInfo, $provider)
    {

        $user = User::where('provider_id', $getInfo->id)->first();

        if ($provider == 'facebook' || $provider == 'github' || $provider == 'google') {
            if (!$user) {
                $user = User::create(
                    [
                        'name' => $getInfo->name,
                        'email' => $getInfo->email,
                        'password' => bcrypt(str_random(10)),
                        'provider' => $provider,
                        'provider_id' => $getInfo->id
                    ]
                );
            }
        } else {
            if (!$user) {
                $user = User::create(
                    [
                        'name' => $getInfo->name,
                        'email' => strtolower($getInfo->nickname) . "@gmail.com",
                        'password' => bcrypt(str_random(10)),
                        'provider' => $provider,
                        'provider_id' => $getInfo->id
                    ]
                );
            }
        }
        return $user;
    }
}