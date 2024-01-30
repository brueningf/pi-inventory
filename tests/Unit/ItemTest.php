<?php

namespace Tests\Unit;

use App\Category;
use App\Item;
use App\ItemCase;
use App\Manufacturer;
use App\StorageLocation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    public function an_image_path_is_returned()
    {
        $item = factory(Item::class)->make();

        $this->assertNotNull($item->imagePath());
    }

    /** @test */
    public function a_path_is_returned()
    {
        $item = factory(Item::class)->make();

        $this->assertNotNull($item->path());
    }

    /** @test */
    public function it_belongs_to_a_category()
    {
        $item = factory(Item::class)->create();

        $this->assertInstanceOf(Category::class, $item->category);
    }

    /** @test */
    public function it_has_a_item_case()
    {
        $item = factory(Item::class)->create();

        $this->assertInstanceOf(ItemCase::class, $item->itemCase);
    }

    /** @test */
    public function it_can_have_a_manufacturer()
    {
        $item = factory(Item::class)->create(['manufacturer_id' => null]);

        $this->assertEquals(null, $item->manufacturer);

        $item->manufacturer()->associate(factory(Manufacturer::class)->make());

        $this->assertInstanceOf(Manufacturer::class, $item->manufacturer);
    }


    /** @test */
    public function it_can_have_many_storage_locations()
    {
        $item = factory(Item::class)->create();

        $item->storageLocations()->saveMany([
            factory(StorageLocation::class)->make(),
            factory(StorageLocation::class)->make(),
            factory(StorageLocation::class)->make()
        ]);

        $this->assertCount(3, $item->storageLocations);
    }

    /** @test */
    function it_has_an_image()
    {
        $item = factory(Item::class)->create();

        $this->assertNotNull($item->imagePath());
    }

}
