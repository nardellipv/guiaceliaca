<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use guiaceliaca\Prices;
use Faker\Generator as Faker;

$factory->define(Prices::class, function (Faker $faker) {
    return [
        'name' => $faker->text,
        'description' =>  $faker->numberBetween('100','1000')
    ];
});
