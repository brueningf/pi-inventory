<?php

namespace Tests\Feature;

use App\Category;
use App\ItemCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateItemCasesTest extends TestCase {

    use DatabaseMigrations, WithFaker, RefreshDatabase;

    /**  @test */
    public function it_can_create_an_item_case()
    {
        $this->withoutExceptionHandling();
        $itemCase = factory(ItemCase::class)->make();

        $response = $this->post('/item-cases', $itemCase->toArray());

        $response->assertStatus(302);

        $this->get($itemCase->path())->assertSee($itemCase['name']);
    }


    /**  @test */
    public function it_can_update_an_item_case()
    {
        $itemCase = factory(ItemCase::class)->create();

        $array = $itemCase->toArray();
        $array['name'] = 'New random name';

        $response = $this->put($itemCase->path(), $array);

        $response->assertStatus(302);

        $this->get($itemCase->fresh()->path())->assertSee($array['name']);
    }

    /**  @test */
    public function it_can_delete_an_item_case()
    {
        $itemCase = factory(ItemCase::class)->create();

        $response = $this->delete($itemCase->path());

        $response->assertStatus(302);

        $this->assertDeleted('item_cases', $itemCase->toArray());
    }

}
