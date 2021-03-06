<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'code'
    ];

    /**
     * Continent has Many Countries
     * 
     * @return void
     */
    public function countries()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * The User Belongs to Many Countries
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsToMany(User::class, 'continent_user')->withTimestamps();
    }
}
