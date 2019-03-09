<?php

use Faker\Generator as Faker;
use App\Answer;

$factory->define(
    Answer::class,
    function (Faker $faker) {
        return [
            'title' => $faker->sentence(),
            'correct' => 1,
        ];
    }
);
