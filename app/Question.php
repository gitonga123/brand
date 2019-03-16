<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'published', 'points'
    ];

    /**
     * The answers that to the questions
     *
     * @return void
     */
    public function answers()
    {
        return $this->belongsToMany(Answer::class, 'answer_question');
    }

    /**
     * The hints that to the questions
     *
     * @return void
     */
    public function hints()
    {
        return $this->belongsToMany(Hint::class, 'hint_question');
    }

    /**
     * The question that has one answer
     * 
     * @return void
     */
    public function answer()
    {
        return $this->hasOne(QuestionAnswer::class, 'question_id');
    }

    /**
     * The Question that is already answered
     * 
     * @return void
     */
    public function tracker()
    {
        return $this->hasMany(Tracker::class, 'question_id');
    }
}
