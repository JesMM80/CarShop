<?php

namespace Tests\Feature;

use App\Models\Brand;
use Tests\TestCase;
use App\Models\User;
use App\Models\Release;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReleaseControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_it_displays_the_release_view_correctly()
    {
        // Crear un usuario y autenticarlo
        $user = User::factory()->create();

        $this->actingAs($user);
        
        // Crea una instancia de Release en la base de datos
        $release = Release::factory()->create([
            'title' => 'Test Release Title',
            'description' => 'Test Release Description',
            'image' => 'test-image.jpg',
        ]);

        // Realiza una solicitud GET al controlador
        $response = $this->get(route('releases.show', $release->id));

        // Verifica que la vista se renderiza correctamente
        $response->assertStatus(200);
        $response->assertViewIs('releases.show');
        $response->assertViewHas('release', $release);

        // Verifica que los datos se muestran correctamente en la vista
        $response->assertSee('Test Release Title');
        $response->assertSee('Test Release Description');
        $response->assertSee('test-image.jpg');
    }

    public function test_it_display_all_brands()
    {
        $user = User::factory()->create();
        $this->actingAs($user);


        $brands = Brand::create([
            'name' => 'Mercedes',
            'country' => 'Germany',
            'logo' => 'Mercedes.jpg'
        ]);
        $brands = Brand::create([
            'name' => 'BMW',
            'country' => 'Germany',
            'logo' => 'BMW.jpg'
        ]);

        $response = $this->get(route('brands.index'));
        $response->assertStatus(200);
        $response->assertViewIs('brands.index');
        $response->assertViewHas('brands');
        

    }

}
