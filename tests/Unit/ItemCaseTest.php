<?php

namespace Tests\Unit;

use App\ItemCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemCaseTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_slug_as_path() {
        $itemCase = factory(ItemCase::class)->make();

        $this->assertNotNull($itemCase->path());
    }
}
