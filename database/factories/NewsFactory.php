<?php

use App\News;
use App\User;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) use ($factory) {

    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'status' => 'publish',
        'title' => $faker->realText(40),
        'summary' => $faker->realText(500),
        'image' => 'files/_test/' . rand(1, 10) . '.jpg',
        'content' => $faker->realText(rand(1, 5) * 1000),
        'publish_at' => now(),
        'expire_at' => now()->addWeek(rand(5, 10)),
    ];
});
