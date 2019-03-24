<?php

use App\Album;
use App\User;
use Faker\Generator as Faker;

$factory->define(Album::class, function (Faker $faker) use ($factory) {

    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'title' => $faker->realText(40),
        'image' => 'files/_test/' . rand(1, 10) . '.jpg',
    ];
});
