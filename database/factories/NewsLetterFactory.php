<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use guiaceliaca\NewsLetter;
use Faker\Generator as Faker;

$factory->define(NewsLetter::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
    ];
});
