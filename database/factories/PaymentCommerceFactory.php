<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use guiaceliaca\PaymentCommerce;
use Faker\Generator as Faker;

$factory->define(PaymentCommerce::class, function (Faker $faker) {
    return [
        'commerce_id' => rand(1, 10),
        'payment_id' => rand(1, 8),
    ];
});
