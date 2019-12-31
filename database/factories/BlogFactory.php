<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use guiaceliaca\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    $title = $faker->unique()->word(5);
    return [
        'title' => $title,
        'body' => $faker->paragraph($nbSentences = 50, $variableNbSentences = true),
        'photo' => '',
        'status' => $faker->randomElement($array = array('ACTIVE', 'DESACTIVE')),
        'view' => rand(1,100),
        'like' => rand(1,100),
        'slug' => $title,
        'user_id' => rand(1, 10),
    ];
});
