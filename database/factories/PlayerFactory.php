<?php

use Faker\Generator as Faker;
use App\Player;

$factory->define(
    Player::class,
    function (Faker $faker) {
        return [
            'title' => $faker->sentence(6),
            'emoji' => $faker->image()
        ];
    }
);
