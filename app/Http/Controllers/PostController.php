<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->index();
        return view('posts.index', compact('posts'));
    }

    public function show(User $user, Post $post)
    {
        $post = Post::where('user_id', $user->id)->where('slug', $post->slug)->firstOrFail();
        return view('posts.show', compact('post'));
    }
}
