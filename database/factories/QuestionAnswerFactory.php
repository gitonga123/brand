<?php

use Faker\Generator as Faker;
use App\QuestionAnswer;

$factory->define(
    QuestionAnswer::class,
    function (Faker $faker) {
        return [
            'question_id' => $faker->numberBetween(1, 1000),
            'answer_id' => $faker->numberBetween(1, 1000),
        ];
    }
);
