<?php

use Faker\Generator as Faker;
use App\Level;

$factory->define(
    Level::class,
    function (Faker $faker) {
        return [
            'level' => $faker->sentence()
        ];
    }
);
