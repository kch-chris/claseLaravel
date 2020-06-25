<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Clients::class, function (Faker $faker) {
    return [

        'name'=> $faker->sentence(1),

        'lastname'=> $faker->sentence(1),

        'email' => $faker->unique()->safeEmail,

        'phone' => $faker->phoneNumber,

        'age' => $faker->randomNumber($nbDigits = NULL, $strict = false),

        'sex' => $faker->sentence(1),

        'price' =>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 5000)
    ];
});
