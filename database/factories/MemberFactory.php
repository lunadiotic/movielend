<?php

use App\Member;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'age' => $faker->numberBetween(14, 200),
        'address' => $faker->address,
        'telephone' => $faker->e164PhoneNumber,
        'identity_number' => $faker->swiftBicNumber,
        'joined' => $faker->date('Y-m-d', 'now'),
        'is_active' => $faker->randomElement([true, false])
    ];
});
