<?php

namespace Tests\Feature;

use App\Models\Release;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SaveCommentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testPruebaGuardaComentarioEnRelease(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $release = Release::create([
            'title' => 'Release title',
            'description' => 'Description release'
        ]);

        $post = [
            'release_id' => $release->id,
            'comment' => 'Comentario de prueba',
            'user' => 'John'
        ];

        $response = $this->post(route('comments.store',$post));
        
        $this->assertDatabaseHas('comments', [
            'release_id' => $release->id,
            'comment' => 'Comentario de prueba',
            'user' => 'John',
        ]);
        
        $response->assertStatus(201);
    }
}
