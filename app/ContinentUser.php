<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContinentUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'continent_id', 'user_id'
    ];

    /**
     * A level belongs to Level
     * 
     * @return void
     */
    public function continents()
    {
        return $this->belongsTo(Continent::class);
    }

    /**
     * An user belongs to User
     * 
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
