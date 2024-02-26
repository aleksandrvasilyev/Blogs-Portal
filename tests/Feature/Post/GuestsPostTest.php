<?php

namespace Tests\Feature\Post;


use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class GuestsPostTest extends TestCase
{
    use LazilyRefreshDatabase;

    // admin page

    // his posts
        // positive
            // C // test_guest_cannot_create_a_post_with_valid_data
    public function test_guest_cannot_create_a_post_with_valid_data()
    {
        $post = Post::factory()->raw();
        $response = $this->post(route('profile.posts.store'), $post);
        $response->assertRedirect(route('login'));
        $this->assertDatabaseMissing('posts', $post);
    }
            // R // test_guest_cannot_view_edit_form_for_existing_post
    public function test_guest_cannot_view_edit_form_for_existing_post()
    {
        $post = Post::factory()->create();
        $response = $this->get(route('profile.posts.edit', $post->id));
        $response->assertRedirect(route('login'));
    }
            // U // test_guest_cannot_update_the_existing_post
    public function test_guest_cannot_update_the_existing_post()
    {
        $post = Post::factory()->create();
        $response = $this->patch(route('profile.posts.update', $post->id));
        $response->assertRedirect(route('login'));
    }
            // D // test_guest_cannot_delete_the_existing_post
    public function test_guest_cannot_delete_the_existing_post()
    {
        $post = Post::factory()->create();
        $response = $this->delete(route('profile.posts.delete', $post->id));
        $response->assertRedirect(route('login'));
        $this->assertDatabaseHas('posts', [
            'title' => $post->title,
            'slug' => $post->slug,
        ]);

    }
        // negative
            // C // test_guest_cannot_create_a_post_with_invalid_data
    public function test_guest_cannot_create_a_post_with_invalid_data()
    {
        $post = Post::factory(['title' => null])->raw();
        $response = $this->post(route('profile.posts.store'), $post);
        $response->assertRedirect(route('login'));
        $this->assertDatabaseMissing('posts', $post);
    }

            // R // test_guest_cannot_view_edit_form_for_non_existing_post

    public function test_guest_cannot_view_edit_form_for_non_existing_post()
    {
        $postId = 999;
        if(!Post::find($postId)) {
            $response = $this->get(route('profile.posts.edit', $postId));
            $response->assertRedirect(route('login'));
        }
    }


            // U // test_guest_cannot_update_non_existing_post
    public function test_guest_cannot_update_non_existing_post()
    {
        $postId = 999;
        if(!Post::find($postId)) {
            $response = $this->patch(route('profile.posts.update', $postId));
            $response->assertRedirect(route('login'));
        }
    }
            // D // test_guest_cannot_delete_non_existing_post
    public function test_guest_cannot_delete_non_existing_post ()
    {
        $postId = 999;
        if(!Post::find($postId)) {
            $response = $this->delete(route('profile.posts.delete', $postId));
            $response->assertRedirect(route('login'));
        }
}


    // home page

        // his posts
            // positive
                // C -
                // R // test_guest_can_view_published_post
    public function test_guest_can_view_published_post()
    {
        $user = User::factory()->create();
        $post = Post::factory(['user_id' => $user->id])->create();
        $this->get($post->path())
            ->assertSee($post['title'])
            ->assertSee($post['body']);
    }
                // U -
                // D -

            // negative
                // C -
                // R // test_user_cannot_view_not_published_post
    public function test_user_cannot_view_not_published_post()
    {
        $user = User::factory()->create();
        $post = Post::factory(['user_id' => $user->id, 'status' => 'draft'])->create();
        $this->get($post->path())
            ->assertNotFound()
            ->assertDontSee($post['title'])
            ->assertDontSee($post['body']);
 }
                // R // test_user_cannot_view_non_existing_post
    public function test_user_cannot_view_non_existing_post()
    {
        $postId = 999;
        if(!Post::find($postId)) {
            $this->get(route('posts.show', ['', $postId]))
                ->assertNotFound();
        }
    }
                // U -
                // D -

}
