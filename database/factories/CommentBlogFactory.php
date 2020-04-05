<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use guiaceliaca\CommentBlog;
use Faker\Generator as Faker;

$factory->define(CommentBlog::class, function (Faker $faker) {
    return [
        'message' => $faker->sentence($nbWords = 100, $variableNbWords = true),
        'user_id' => rand(1, 10),
        'post_id' => rand(1, 50),
    ];
});
