<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use guiaceliaca\Picture;
use Faker\Generator as Faker;

$factory->define(Picture::class, function (Faker $faker) {
    return [
        'name' => $faker->imageUrl(),
        'user_id' => rand(1, 10),
    ];
});
