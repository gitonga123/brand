<?php

use Faker\Generator as Faker;
use App\Sport;

$factory->define(
    Sport::class,
    function (Faker $faker) {
        return [
            'title' => $faker->sentence(5),
            'emoji' => $faker->image()
        ];
    }
);
