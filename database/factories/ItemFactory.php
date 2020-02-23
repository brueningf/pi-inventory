<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'provider_code' => Str::random(10),
        'marking_code' => Str::random(10),
        'price' => Str::random(2),
        'image' => '',
        'category_id' => factory(\App\Category::class),
        'manufacturer_id' => factory(\App\Manufacturer::class),
        'item_case_id' => factory(\App\ItemCase::class),
    ];
});
