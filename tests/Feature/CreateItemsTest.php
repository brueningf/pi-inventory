<?php

namespace Tests\Feature;

use App\Category;
use App\Item;
use App\ItemCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateItemsTest extends TestCase {

    use DatabaseMigrations, WithFaker, RefreshDatabase;

    /**  @test */
    public function it_can_be_created()
    {
        $item = factory(Item::class)->make();

        $response = $this->post('/items', $item->toArray());

        $response->assertStatus(302);

        $this->assertDatabaseHas('items', $item->toArray());
    }

    /** @test */
    public function it_can_be_updated()
    {
        $item = factory(Item::class)->create();

        $data = $item->toArray();

        $data['name'] = 'Updated Item';

        $response = $this->patch(route('items.update', $item), $data);

        $response->assertStatus(302);

        $this->get($item->path())->assertSee($data['name']);
    }

    /** @test */
    public function it_can_be_deleted()
    {
        $item = factory(Item::class)->create();

        $response = $this->delete(route('items.destroy', $item));

        $response->assertStatus(302);

        $this->assertDeleted('items', $item->toArray());
    }

    /** @test */
    public function a_category_is_required()
    {
        $item = factory(Item::class)->make(['category_id' => null]);

        $response = $this->post('/items', $item->toArray());

        $response->assertSessionHasErrors(['category_id']);
    }

    /** @test */
    public function a_item_case_is_required()
    {
        $item = factory(Item::class)->make(['item_case_id' => null]);

        $response = $this->post('/items', $item->toArray());

        $response->assertSessionHasErrors(['item_case_id']);
    }
}
