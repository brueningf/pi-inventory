<?php

namespace Tests\Unit;

use App\Item;
use App\Manufacturer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManufacturerTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    function it_returns_a_path()
    {
        $manufacturer = factory(Manufacturer::class)->create();

        $this->assertNotNull($manufacturer->path());
    }

    /** @test */
    function it_can_have_many_items()
    {
        $manufacturer = factory(Manufacturer::class)->create();

        $manufacturer->items()->saveMany([
            factory(Item::class)->make(),
            factory(Item::class)->make(),
            factory(Item::class)->make()
        ]);

        $this->assertCount(3, $manufacturer->items);
    }
}
