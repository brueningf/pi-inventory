<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(150),
            'marking_code' => fake()->userName(),
            'price' => fake()->randomFloat(2, 0, 100000),
            'sorting' => fake()->randomDigit(),
            'weight' => fake()->randomFloat(3, 0, 1000),
            'valid' => false,
            'manufacturer_id' => Manufacturer::factory()
        ];
    }
}
