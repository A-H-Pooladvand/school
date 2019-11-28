<?php

use App\User;
use App\Link;
use Faker\Generator as Faker;

$factory->define(Link::class, static function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'title' => $faker->realText(40),
        'link' => $faker->url,
        'priority' => random_int(1, 255),
    ];
});
