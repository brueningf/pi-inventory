<?php

namespace Tests\Unit;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    function test_that_item_has_a_name(): void
    {
        $item = Item::factory()->create();

        $this->assertIsString($item->name);
    }


    function test_that_item_can_have_a_description(): void
    {
        $item = Item::factory()->create();

        $this->assertIsString($item->description);

        $itemWithoutDescription = Item::factory()->make();
        $itemWithoutDescription->description = null;
        $itemWithoutDescription->save();

        $this->assertNull($itemWithoutDescription->fresh()->description);
    }

    function test_that_an_item_can_have_a_marking_code(): void
    {
        $item = Item::factory()->create();

        $this->assertIsString($item->marking_code);
    }

    function test_that_an_item_has_a_price(): void
    {
        $item = Item::factory()->create();

        $this->assertIsNumeric($item->price);
    }

    function test_that_an_item_has_sorting(): void
    {
        $item = Item::factory()->create();

        $this->assertIsNumeric($item->sorting);
    }

    function test_that_an_item_has_weight(): void
    {
        $item = Item::factory()->create();

        $this->assertIsNumeric($item->weight);
    }

    function test_that_an_item_can_be_a_draft(): void
    {
        $item = Item::factory()->create();

        $this->assertIsBool($item->valid);
    }


    function test_it_belongs_to_one_manufacturer(): void
    {
        $item = Item::factory()->create();

        $this->assertIsObject($item->manufacturer);
    }
}
