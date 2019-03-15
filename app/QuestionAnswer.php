<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id', 'answer_id'
    ];

    /**
     * A question belongs to Question
     * 
     * @return void
     */
    public function question()
    {
        return $this->belongsTo(\App\Question::class);
    }

    /**
     * An Answer belongs to an Answer
     */
    public function answer()
    {
        return $this->belongsTo(\App\Answer::class);
    }
}
