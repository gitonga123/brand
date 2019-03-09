<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The Answers that long to the questions
     */
    public function questions()
    {
        return $this->belongsToMany(
            Question::class,
            'answer_question'
        )->withPivot('correct_answer')->withTimestamps();
    }
}
