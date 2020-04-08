<?php

namespace Tests\Unit;

use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    function it_returns_a_path()
    {
        $category = factory(Category::class)->create();

        $this->assertNotNull($category->path());
    }

    /** @test */
    function it_can_have_subcategories()
    {
        $category = factory(Category::class)->create();

        $category->subcategories()->saveMany([
            factory(Category::class)->create(),
            factory(Category::class)->create(),
            factory(Category::class)->create(),
        ]);

        $this->assertCount(3, $category->subcategories);
    }
}
