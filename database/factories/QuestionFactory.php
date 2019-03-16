<?php

use Faker\Generator as Faker;
use App\Question;
use App\Level;

$factory->define(
    Question::class,
    function (Faker $faker) {
        return [
            'title' => $faker->paragraph(1),
            'published' => random_int(1, 2),
            'points' => $faker->randomDigit,
            'level_id' => factory(Level::class)->create()->id
        ];
    }
);
