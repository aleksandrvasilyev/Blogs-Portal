<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
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
        $user = User::factory()->create();
        $post = Post::factory()->raw();

        $this->actingAs($user)->post(route('posts.store'), $post)->assertRedirect('/posts');

        $this->assertDatabaseHas('posts', [
            'title' => $post['title'],
            'slug' => $post['slug'],
        ]);

        $this->get(route('posts.index'))->assertSee($post['title']);

    }

    public function test_a_post_requires_a_title()
    {
        $user = User::factory()->create();

        $post = Post::factory()->raw(['title' => '']);
        $this->actingAs($user)->post(route('posts.store'), $post)->assertSessionHasErrors('title');
    }

    public function test_a_user_can_view_a_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $this->get($post->path())
            ->assertSee($post['title'])
            ->assertSee($post['body']);
    }

    public function test_post_has_a_path(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $path = '/'.$user->username.'/'.$post->slug;
        $this->assertEquals($path, $post->path());
    }


    public function test_only_auth_user_can_create_a_post()
    {

        $attributes = Post::factory()->raw();
        $this->post('/posts', $attributes)->assertRedirect('login');
    }

    public function test_a_user_has_posts()
    {
        $user = User::factory()->create();
        $this->assertInstanceOf(Collection::class, $user->posts);
    }
}
