<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Item;
use App\ItemCase;
use App\Manufacturer;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'provider_code' => Str::random(1) . rand(1000, 10000),
        'marking_code' => $faker->word . rand(10, 1000),
        'price' => rand(10, 1000),
        'image' => '',
        'category_id' => factory(Category::class),
        'manufacturer_id' => factory(Manufacturer::class),
        'item_case_id' => factory(ItemCase::class),
    ];
});
