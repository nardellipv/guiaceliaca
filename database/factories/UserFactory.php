<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use guiaceliaca\User;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'type' => $faker->randomElement($array = array('ADMIN', 'CLIENT', 'OWNER')),
        'status' => $faker->randomElement($array = array('ACTIVE', 'DESACTIVE')),
        'password' => bcrypt('123'),
        'lastLogin' => Date::parse('-10day'),
        'remember_token' => Str::random(10),
    ];
});
