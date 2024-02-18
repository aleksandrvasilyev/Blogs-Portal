<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'slug' => 'required|string',
            'user_id' => 'integer',
            'category_id' => 'integer',
            'status' => 'string',
            'views' => 'integer',
            'pinned' => 'boolean',
            'edited' => 'boolean'
        ]);

        Post::create($validatedData);

        return response('Post created successfully', 201);

    }
}
