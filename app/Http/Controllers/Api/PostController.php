<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['author', 'category', 'tags'])->where('status', 'published')->paginate(10);
        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {
        $post = Post::with(['author', 'category', 'group', 'tags', 'comments', 'likes', 'favorites'])
            ->where('id', $post->id)
            ->where('status', 'published')->firstOrFail();
        return PostResource::make($post);
    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $post = auth()->user()->posts()->create($validated);
        return response()->json($post, 201);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        dd(request()->all());
        $this->authorize('update', $post);
        $updated = $post->update($request->validated());
        return response()->json($updated ? PostResource::make($post) : ['message' => 'Update failed'], $updated ? 200 : 400);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $deleted = $post->delete();
        return response()->json(['message' => $deleted ? 'Deleted successfully' : 'Delete failed'], $deleted ? 200 : 400);
    }

}
