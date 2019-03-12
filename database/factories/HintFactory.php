<?php

use Faker\Generator as Faker;
use App\Hint;

$factory->define(Hint::class, function (Faker $faker) {
    return [
        'hint' => $faker->sentence()
    ];
});
