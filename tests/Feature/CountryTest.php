<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CountryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testMuestraListadoPaises(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/countries');
        $response->assertStatus(200);

        
    }
}
