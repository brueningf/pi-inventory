<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'image' => ''
    ];
});

$factory->state(Category::class, 'subcategory', [
    'parent_id' => factory(Category::class)
]);
