<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id', 'user_id'
    ];

    /**
     * A level belongs to Level
     * 
     * @return void
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
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
