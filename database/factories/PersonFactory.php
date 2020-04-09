<?php

/** @var Factory $factory */

use App\Person;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->firstName,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'city' => $faker->city,
    ];
});
