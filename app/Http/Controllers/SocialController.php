<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Social\FacebookServiceProvider;
use App\Social\TwitterServiceProvider;
use GuzzleHttp\Exception\ClientException;
use Laravel\Socialite\Two\InvalidStateException;
use League\OAuth1\Client\Credentials\Credentials;
use League\OAuth1\Client\Credentials\CredentialsException;


class SocialController extends Controller
{
    protected $providers = [
        'facebook' => FacebookServiceProvider::class,
        'twitter' => TwitterServiceProvider::class,
    ];
    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Redirect the user to provider authentication page
     * 
     * @param  string $provider
     * 
     * @return \Illuminate\Http\Response
     */
    public function redirect(string $provider)
    {
        return (new $this->providers[$provider])->redirect();
    }

    /**
     * Handle provider response
     * 
     * @param  string $provider
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(string $provider)
    {
        try {
            return (new $this->providers[$provider])->handle();
        } catch (InvalidStateException $e) {
            return $this->redirectToProvider($provider);
        } catch (ClientException $e) {
            return $this->redirectToProvider($provider);
        } catch (CredentialsException $e) {
            return $this->redirectToProvider($provider);
        }
    }


}
