<?php

use App\User;
use App\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) use ($factory) {

    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'title' => $faker->realText(50),
        'image' => 'files/_test/' . rand(1, 10) . '.jpg',
        'description' => $faker->realText(500),
        'link' => $faker->url,
    ];
});
