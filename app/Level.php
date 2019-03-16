<?php

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
}
