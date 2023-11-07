<?php

namespace Tests\Unit;

use App\Models\Item;
use App\Models\Manufacturer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManufacturerTest extends TestCase
{
    use RefreshDatabase;

    function test_it_has_a_name(): void
    {
        $manufacturer = Manufacturer::factory()->create();

        $this->assertIsString($manufacturer->name);
    }

    function test_it_can_have_a_website_url(): void
    {
        $manufacturer = Manufacturer::factory()->create();

        $this->assertNull($manufacturer->website_url);

        $manufacturer = Manufacturer::factory()->create([
            'website_url' => fake()->url()
        ]);

        $this->assertNotNull($manufacturer->website_url);
    }

    function test_it_can_have_a_photo(): void
    {
        $manufacturer = Manufacturer::factory()->create();

        $this->assert
    }
}
