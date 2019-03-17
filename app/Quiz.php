<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quiz_id', 'question_id'
    ];

    /**
     * Quiz has multiple questions
     * 
     * @return void
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'id');
    }

    /**
     * Find quizes based on Quiz Id
     *
     * @param int $quiz_id
     * @return void
     */
    public function getQuestions($quiz_id)
    {
        return $this->where('quiz_id', $quiz_id)->get();
    }
}
