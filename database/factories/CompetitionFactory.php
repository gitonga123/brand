<?php

use Faker\Generator as Faker;
use App\Competition;

$factory->define(
    Competition::class,
    function (Faker $faker) {
        return [
            'title' => $faker->sentence(8)
        ];
    }
);
