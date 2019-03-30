<?php

namespace App\Http\Controllers;

use App\UserSetting;
use Illuminate\Http\Request;
use App\Http\Requests\UserSettingsRequest;
use App\Level;
use App\User;
use App\Country;
use App\Continent;

class UserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserSettingsRequest $request, $user)
    {
        $result = $request->createSetting($user);
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserSetting  $userSetting
     * @return \Illuminate\Http\Response
     */
    public function show(UserSetting $userSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserSetting  $userSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSetting $userSetting)
    {
        //
    }

    /**
     * Update Level the specified resource in storage.
     *
     * @param  \App\Level $level
     * @param  \App\User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function updateLevel(Level $level, User $user)
    {
        $level->user()->attach($user->id);
        return response()->json(['success' => true]);
    }

    /**
     * Update Level the specified resource in storage.
     *
     * @param  \App\Country $country
     * @param  \App\User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function updateCountry(Country $country, User $user)
    {
        $country->user()->attach($user->id);
        return response()->json(['success' => true]);
    }

    /**
     * Update Level the specified resource in storage.
     *
     * @param  \App\Continent $continent
     * @param  \App\User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function updateContinent(Continent $continent, User $user)
    {
        $continent->user()->attach($user->id);
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserSetting  $userSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSetting $userSetting)
    {
        //
    }
}
