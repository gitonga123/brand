<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'correct'
    ];

    /**
     * The Answers that belong to the questions
     * 
     * @return void
     */
    public function questions()
    {
        return $this->belongsToMany(
            AnswerQuestion::class,
            'answer_question'
        )->withPivot('correct_answer')->withTimestamps();
    }

    /**
     * The answer that belong to the question
     * 
     * @return void
     */
    public function question()
    {
        return $this->hasOne(QuestionAnswer::class, 'answer_id');
    }
}
