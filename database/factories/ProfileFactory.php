<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Profile;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'phone_number' => $faker->unique()->phone,
        'city_name' => $faker->city_name,
        'age' => $faker->age,
        'gender' => $faker->gender,
        'profile_pic' => $faker->unique()->profile_pic
    ];
});




