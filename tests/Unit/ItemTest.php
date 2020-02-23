<?php

namespace Tests\Unit;

use App\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->item = factory(Item::class)->make();
    }

    /** @test */
    public function an_image_path_is_returned() {

       $this->assertNotNull($this->item->imagePath());
   }

    /** @test */
    public function a_path_is_returned() {

        $this->assertNotNull($this->item->path());
    }

}
