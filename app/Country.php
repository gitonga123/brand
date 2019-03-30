<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'emoji', 'continent_id'
    ];

    /**
     * The User Belongs to Many Countries
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsToMany(User::class, 'country_user')->withTimestamps();
    }

    /**
     * Belongs to A Certain Continent
     * 
     * @return void
     */
    public function continent()
    {
        return $this->hasMany(Continent::class);
    }
}
