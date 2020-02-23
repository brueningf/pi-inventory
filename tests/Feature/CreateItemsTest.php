<?php

namespace Tests\Feature;

use App\Category;
use App\ItemCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateItemsTest extends TestCase
{
    use DatabaseMigrations, WithFaker, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->category = factory(Category::class)->create();
        $this->itemCase = factory(ItemCase::class)->create();

    }

    /**  @test */
    public function a_guest_can_create_an_item()
    {
        $attributes = [
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'price' => 10.0,
            'provider_code' => $this->faker->word,
            'category_id' => $this->category->id,
            'item_case_id' => $this->itemCase->id
        ];

        $response = $this->post('/items', $attributes);

        $response->assertStatus(302);

        $this->assertDatabaseHas('items', $attributes);
    }
}
