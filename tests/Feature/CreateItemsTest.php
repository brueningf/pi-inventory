<?php

namespace Tests\Feature;

use App\Category;
use App\ItemCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateItemsTest extends TestCase {

    use DatabaseMigrations, WithFaker, RefreshDatabase;


    /**  @test */
    public function an_item_can_be_created()
    {
        $category = factory(Category::class)->create();
        $itemCase = factory(ItemCase::class)->create();

        $attributes = [
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'price' => 10.0,
            'provider_code' => $this->faker->word,
            'category_id' => $category->id,
            'item_case_id' => $itemCase->id
        ];

        $response = $this->post('/items', $attributes);

        $response->assertStatus(302);

        $this->assertDatabaseHas('items', $attributes);
    }

    /** @test */
    public function a_category_is_required_when_creating_an_item()
    {
        $itemCase = factory(ItemCase::class)->create();

        $attributes = [
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'price' => 10.0,
            'provider_code' => $this->faker->word,
            'category_id' => null,
            'item_case_id' => $itemCase->id
        ];

        $response = $this->post('/items', $attributes);

        $response->assertSessionHasErrors(['category_id']);
    }

    /** @test */
    public function a_item_case_is_required_when_creating_an_item()
    {
        $category = factory(Category::class)->create();

        $attributes = [
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'price' => 10.0,
            'provider_code' => $this->faker->word,
            'category_id' => $category->id,
            'item_case_id' => null
        ];

        $response = $this->post('/items', $attributes);

        $response->assertSessionHasErrors(['item_case_id']);
    }
}
