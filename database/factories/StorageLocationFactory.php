<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use App\StorageLocation;
use Faker\Generator as Faker;

$factory->define(StorageLocation::class, function (Faker $faker) {
    return [
        'location' => $faker->sentence(3),
        'column' => $faker->randomNumber(2),
        'level'  => $faker->randomNumber(3),
        'stock'  => $faker->randomNumber(3),
        'item_id' => factory(Item::class)
    ];
});
