<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'level_id', 'user_id'
    ];

    /**
     * A level belongs to Level
     * 
     * @return void
     */
    public function level()
    {
        return $this->belongsTo(Level::class);
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
