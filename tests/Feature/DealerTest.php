<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Country;
use App\Models\Dealer;
use App\Models\Province;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DealerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testListaDealers(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Country::factory()->count(5)->create();
        Province::factory()->count(5)->create();
        Brand::factory()->count(5)->create();
        $dealers = Dealer::factory()->count(5)->create();

        $response = $this->get('/dealers');
        $response->assertStatus(200);
        $response->assertViewIs('dealers.index');
        $response->assertViewHas('dealers');

        $datos = $response->getContent();
        $this->assertStringContainsString('Listado',$datos);

        $dealers = $response->viewData('dealers');
        $this->assertCount(5, $dealers);
    }
}
