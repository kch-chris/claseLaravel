<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Products;
use Faker\Generator as Faker;

$factory->define(App\Models\Products::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph(1),

        'name'=> $faker->sentence(2),

        'cost'=>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 250),

        'price' =>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 500)
    ];
});
