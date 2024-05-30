<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CountryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testMuestraListadoPaises(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Country::factory()->count(10)->create();

        // $response = $this->get('/countries');
        $response = $this->get(route('countries.index'));
        $response->assertStatus(200);

        $response->assertViewIs('countries.index');
        $response->assertViewHas('countries');

        $viewCountries = $response->viewData('countries');
        $this->assertCount(5, $viewCountries);
    }
}
