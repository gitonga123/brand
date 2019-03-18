<?php

use Faker\Generator as Faker;
use App\UserSetting;

$factory->define(
    UserSetting::class,
    function (Faker $faker) {
        return [
            'level_id' => $faker->numberBetween(1, 5),
            'sport_id' => $faker->numberBetween(1, 3),
            'continent_id' => $faker->numberBetween(1, 7),
            'country_id' =>  $faker->numberBetween(1, 20),
            'competition_id' =>  $faker->numberBetween(1, 15),
            'player_id' =>  $faker->numberBetween(1, 50),
            'user_id' => $faker->numberBetween(1, 1000)
        ];
    }
);
