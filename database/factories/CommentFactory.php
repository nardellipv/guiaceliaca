<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use guiaceliaca\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'message' => $faker->sentence($nbWords = 100, $variableNbWords = true),
        'votes_positive' => rand(1, 100),
        'votes_negative' => rand(1, 100),
        'status' => $faker->randomElement($array = array('ACTIVE', 'DESACTIVE')),
        'commerce_id' => rand(1, 10),
    ];
});
