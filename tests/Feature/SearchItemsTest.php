<?php

namespace Tests\Feature;

use App\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SearchItemsTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    function it_can_search_items_by_name()
    {
        $item = factory(Item::class)->create();

        $response = $this->post('/search', ['q' => $item->name]);

        $response->assertSee($item->name);
    }
}
