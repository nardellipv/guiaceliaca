<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use guiaceliaca\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'messageText' => $faker->sentence($nbWords = 100, $variableNbWords = true),
        'read' => $faker->randomElement($array = array('YES', 'NO')),
        'commerce_id' => rand(1, 10),
    ];
});
