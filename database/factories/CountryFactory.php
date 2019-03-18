<?php

use Faker\Generator as Faker;
use App\Country;

$factory->define(
    Country::class,
    function (Faker $faker) {
        return [
            'title' => $faker->country,
            'emoji' => $faker->image()
        ];
    }
);
