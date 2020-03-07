<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ItemCase;
use Faker\Generator as Faker;

$factory->define(ItemCase::class, function (Faker $faker) {
    return [
        'name' => $faker->randomNumber(3) . strtoupper($faker->word),
        'image' => ''
    ];
});
