<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['author', 'category', 'tags'])->where('status', 'published')->paginate(10);
        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {
        $post = Post::with(['author', 'category', 'group', 'tags', 'comments', 'likes', 'favorites'])->where('id', $post->id)->where('status', 'published')->firstOrFail();
        return PostResource::make($post);
    }
}
