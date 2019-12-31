<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use guiaceliaca\Commerce;
use Faker\Generator as Faker;

$factory->define(Commerce::class, function (Faker $faker) {
    $title = $faker->unique()->word(10);

    return [
        'name' => $title,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'web' => $faker->url,
        'about' => $faker->text($maxNbChars = 500),
        'votes_positive' => rand(0, 100),
        'votes_negative' => rand(0, 100),
        'visit' => rand(0, 100),
        'facebook' => 'https://www.facebook.com/celiacosmendozaOK',
        'twitter' => 'https://twitter.com/nardellip',
        'instagram' => 'https://www.instagram.com/celiacosmendoza/',
        'logo' => '',
        'type' => $faker->randomElement($array = array('FREE','BASIC','CLASIC','PREMIUM')),
        'slug' => $title,
        'user_id' => rand(1, 10),
        'province_id' => 2,
        'region_id' => 6,
    ];
});
