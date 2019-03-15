<?php

use Faker\Generator as Faker;
use App\QuestionAnswer;
use App\Question;
use App\Answer;

$factory->define(
    QuestionAnswer::class,
    function (Faker $faker) {
        return [
            'question_id' => factory(Question::class)->create()->id,
            'answer_id' => factory(Answer::class)->create()->id,
        ];
    }
);
