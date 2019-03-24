<?php

use App\Album;
use App\Gallery;
use App\User;
use Faker\Generator as Faker;

$factory->define(Gallery::class, function (Faker $faker) use ($factory) {

    return [
        'title' => $faker->realText(20),
        'priority' => rand(1,10),
        'path' => 'files/_test/' . rand(1, 10) . '.jpg',
    ];
});
