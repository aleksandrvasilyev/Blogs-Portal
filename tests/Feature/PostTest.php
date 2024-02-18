<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }


    // CRUD
    public function testPostCreate()
    {
        $this->assertDatabaseEmpty('posts');
        $post = Post::factory()->create();
        $this->assertDatabaseHas('posts', [
            'title' => $post->toArray()['title'],
            'slug' => $post->toArray()['slug'],
        ]);
    }

    public function testPostDelete()
    {
        $this->assertDatabaseEmpty('posts');
        $post = Post::factory()->create();
        $this->assertDatabaseHas('posts', [
            'title' => $post->toArray()['title'],
            'slug' => $post->toArray()['slug'],
        ]);
        $post->delete();
        $this->assertDatabaseEmpty('posts');
    }

    public function testPostControllerStore()
    {
        // Arrange
        $user = User::factory()->create();
        $post = Post::factory()->make()->toArray();

        // Act
        $response = $this->actingAs($user)->post('/posts', $post);

        // Assert
        $response->assertStatus(201);
        $this->assertDatabaseHas('posts', [
            'title' => $post['title'],
            'slug' => $post['slug'],
        ]);
    }

}
