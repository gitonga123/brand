<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id', 'answer_id', 'correct', 'user_id', 'points'
    ];

    /**
     * Get the Question Related
     *
     * @return void
     */
    public function question()
    {
        return $this->belongs(Question::class, 'question_id');
    }

    public function getUser(int $user)
    {
        return $this->where('user_id', $user)->get();
    }
}
