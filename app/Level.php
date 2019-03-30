<?php

/**
 * This Class Defines the various difficulty levels of a particular question
 * 1. Beginner
 * 2. Easy
 * 3. Normal
 * 4. Hard
 * 5. Very Hard
 * 
 * Again this could change in terms of naming
 * 
 * @author Daniel Mutwiri <mutwiridaniel@ssbs.com>
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class Level extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'level'
    ];

    /**
     * Get the Question
     * 
     * @return void
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * The User Belongs to Many Levels
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsToMany(User::class, 'level_user');
    }
}
