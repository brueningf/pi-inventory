<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManufacturerTest extends TestCase
{
    function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
