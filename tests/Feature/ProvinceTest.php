<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\Province;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProvinceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

     public function testListadoProvincias()
     {
        $user = User::factory()->create();
        $this->actingAs($user);

        Country::factory()->count(10)->create();
        Province::factory()->count(10)->create();

        $response = $this->get('/provinces');
        $response->assertStatus(200);

        $response->assertViewIs('provinces.index');

        $response->assertViewHas('provinces');

        $viewProvinces = $response->viewData('provinces');

        $this->assertGreaterThanOrEqual(2, $viewProvinces->count());
        
     }
    
}
