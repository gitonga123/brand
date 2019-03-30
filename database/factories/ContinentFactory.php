<?php

use Faker\Generator as Faker;
use App\Continent;

$factory->define(
    Continent::class,
    function (Faker $faker) {
        return [
            'title' => $faker->country
        ];
    }
);
