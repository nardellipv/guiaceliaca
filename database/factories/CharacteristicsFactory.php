<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use guiaceliaca\Characteristics;
use Faker\Generator as Faker;

$factory->define(Characteristics::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'photo' => $faker->imageUrl($width = 100, $height = 50),
    ];
});
