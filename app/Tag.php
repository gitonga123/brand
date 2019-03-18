<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sport_id',
        'continent_id',
        'country_id',
        'competition_id',
        'player_id',
        'question_id'
    ];
}
