<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;

class FavoriteController extends Controller
{
    public function store(Post $post)
    {
        $favorite = $post->favorites()->where('user_id', auth()->id())->first();

        if ($favorite) {
            return response()->json(['message' => 'You have already favorite this post'], 422);
        }

        $newFavorite = $post->favorites()->create([
            'user_id' => auth()->id()
        ]);

        return response()->json($newFavorite, 201);
    }

    public function destroy(Post $post)
    {
        $favorite = $post->favorites()->where('user_id', auth()->id())->first();

        if (!$favorite) {
            return response()->json(['message' => 'Favorite not found'], 422);
        }

        $favorite->delete();

        return response()->json(['message' => 'Favorite has been removed']);
    }
}
