<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'settings' => 'array'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the Successfully answered Question
     * 
     * @return void
     */
    public function tracker()
    {
        return $this->hasMany(Tracker::class, 'user_id');
    }

    /**
     * The Level Belongs to Many User
     *
     * @return void
     */
    public function level()
    {
        return $this->belongsToMany(Level::class, 'level_user');
    }
}
