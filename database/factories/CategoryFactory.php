<?php

use App\Category;
use App\News;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) use ($factory) {

    $classes = [
        News::class,
    ];

    return [
        'category_type' => $classes[rand(0, (count($classes) - 1))],
        'title' => $faker->slug(1),
        'priority' => rand(1, 255),
        'slug' => $faker->slug(1),
    ];
});
