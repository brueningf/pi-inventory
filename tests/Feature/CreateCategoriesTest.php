<?php

namespace Tests\Feature;

use App\Category;
use App\ItemCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateCategoriesTest extends TestCase {

    use DatabaseMigrations, WithFaker, RefreshDatabase;

    /**  @test */
    public function it_can_create_a_category()
    {
        $category = factory(Category::class)->make();

        $response = $this->post('/categories', $category->toArray());

        $response->assertStatus(302);

        $this->get($category->path())->assertSee($category['name']);
    }

    /**  @test */
    public function it_can_update_a_category()
    {
        $category = factory(Category::class)->create();

        $array = $category->toArray();
        $array['name'] = 'Udpated Category';

        $response = $this->put($category->path(), $array);

        $response->assertStatus(302);

        $this->get('/categories/1')->assertSee($array['name']);
    }


    /**  @test */
    public function it_can_delete_a_category()
    {
        $category = factory(Category::class)->create();

        $response = $this->delete($category->path());

        $response->assertStatus(302);

        $this->assertDeleted('categories', $category->toArray());
    }


}
