<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hint extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hint', 'description'
    ];

    /**
     * The Hints that belong to the questions
     */
    public function questions()
    {
        return $this->belongsToMany(
            Question::class,
            'hint_question'
        );
    }
}
