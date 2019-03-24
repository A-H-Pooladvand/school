<?php

use App\User;
use App\About;
use Faker\Generator as Faker;

$factory->define(About::class, function (Faker $faker) use ($factory) {

    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'status' => 'publish',
        'title' => $faker->realText(20),
        'summary' => $faker->realText(200),
        'image' => 'files/_test/' . rand(1, 10) . '.jpg',
        'content' => $faker->realText(rand(1, 5) * 400),
        'publish_at' => now(),
        'priority' => rand(1, 255),
        'expire_at' => now()->addWeek(rand(5, 10)),
    ];
});
