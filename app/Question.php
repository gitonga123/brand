<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The answers that to the questions
     * 
     * @return void
     */
    public function answers()
    {
        return $this->belongsToMany(Answer::class, 'answer_question');
    }
}
