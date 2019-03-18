<?php

use Faker\Generator as Faker;
use App\Tag;

$factory->define(
    Tag::class,
    function (Faker $faker) {
        return [
            'tag' => $faker->sentence(5),
            'sport_id' => $faker->numberBetween(1, 3),
            'continent_id' => $faker->numberBetween(1, 7),
            'country_id' =>  $faker->numberBetween(1, 20),
            'competition_id' =>  $faker->numberBetween(1, 15),
            'player_id' =>  $faker->numberBetween(1, 50),
            'question_id' => $faker->numberBetween(1, 1000)
        ];
    }
);
