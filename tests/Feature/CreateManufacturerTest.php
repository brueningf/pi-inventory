<?php

namespace Tests\Feature;

use App\Manufacturer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class CreateManufacturerTest extends TestCase {

    use DatabaseMigrations, WithFaker, RefreshDatabase;


    /**  @test */
    public function it_can_be_created()
    {
        $manufacturer = factory(Manufacturer::class)->make();

        $response = $this->post('/manufacturers', $manufacturer->toArray());

        $response->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('manufacturers', $manufacturer->toArray());
    }

    /** @test */
    public function it_can_be_updated()
    {
        $manufacturer = factory(Manufacturer::class)->create();

        $data = $manufacturer->toArray();

        $data['name'] = 'Updated Manufacturer';

        $response = $this->patch(route('manufacturers.update', $manufacturer), $data);

        $response->assertStatus(302);

        $this->get($manufacturer->fresh()->path())->assertSee($data['name']);
    }

    /** @test */
    public function it_can_be_deleted()
    {
        $manufacturer = factory(Manufacturer::class)->create();

        $response = $this->delete(route('manufacturers.destroy', $manufacturer));

        $response->assertStatus(302);

        $this->assertDeleted('manufacturers', $manufacturer->toArray());
    }
}
