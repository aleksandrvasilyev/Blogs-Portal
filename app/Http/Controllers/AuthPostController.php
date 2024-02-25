<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;

class AuthPostController
{
    public function store(StorePostRequest $request)
    {
        dd(request()->all());
        $request->validated()['user_id'] = auth()->user();

        auth()->user()->posts()->create($request->validated());

        return redirect('/dashboard', 201);
    }

    public function edit(Post $post)
    {
        $post = Post::where('user_id', auth()->user()->id)->where('id', $post->id)->firstOrFail();
        return view('posts.edit', compact('post'));

    }

    public function show(User $user, Post $post)
    {
        $post = Post::where('user_id', $user->id)->where('slug', $post->slug)->firstOrFail();
        return view('posts.show', compact('post'));
    }

    public function update(UpdatePostRequest $request)
    {

        $post = Post::where('user_id', auth()->user()->id)->where('id', $request->id)->firstOrFail();

//        if ($attributes['thumbnail'] ?? false) {
//            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
//        }

        $post->update($request->validated());

        return back()->with('success', 'Post Updated!');


    }

    public function create()
    {
        return view('posts.create');
    }
}
