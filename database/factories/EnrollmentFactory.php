<?php

use App\Service;
use App\User;
use Faker\Generator as Faker;

$factory->define(\App\Enrollment::class, function (Faker $faker) use ($factory) {

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'major' => $faker->realText(50),
        'grade' => $faker->realText(50),
        'address' => $faker->address,
        'description' => $faker->realText(100),
    ];
});
