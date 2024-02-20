<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MyTest extends TestCase
{

    use LazilyRefreshDatabase;

    public function test_a_user_can_create_a_post()
    {

        $this->withoutExceptionHandling(); // show exceptions!

        $post = Post::factory()->make()->toArray();

        $this->post('/posts', $post);

        $this->assertDatabaseHas('posts', [
            'title' => $post['title'],
            'slug' => $post['slug'],
        ]);

    }

}
