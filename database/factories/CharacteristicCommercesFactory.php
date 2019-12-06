<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\guiaceliaca\CharacteristicCommerce::class, function (Faker $faker) {
    return [
        'characteristic_id' => rand(1, 8),
        'commerce_id' => rand(1, 10),
    ];
});
