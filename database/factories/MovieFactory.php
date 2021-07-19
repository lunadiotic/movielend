<?php

use App\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'genre' => $faker->randomElement(['action', 'adventure', 'comedy', 'crime', 'fantasy']),
        'released' => $faker->date('Y-m-d', 'now')
    ];
});
