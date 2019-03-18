<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'level_id',
        'sport_id',
        'continent_id',
        'country_id',
        'competition_id',
        'player_id',
        'user_id'
    ];
}
