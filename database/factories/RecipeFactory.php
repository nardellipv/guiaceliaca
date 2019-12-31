<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use guiaceliaca\Recipe;
use Faker\Generator as Faker;

$factory->define(Recipe::class, function (Faker $faker) {
    $title = $faker->unique()->word(5);
    return [
        'name' => $title,
        'ingredients' => $faker->sentence($nbWords = 20, $variableNbWords = true),
        'steps' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'photos' => '',
        'likes' => rand('1','100'),
        'slug' => $title,
        'user_id' => rand('1','10'),
        'category_id' => rand('1','5'),
    ];
});
