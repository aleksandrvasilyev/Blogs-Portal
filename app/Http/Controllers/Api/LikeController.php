<?php

namespace App\Http\Controllers\Api;


use App\Models\Comment;
use App\Models\Post;

class LikeController
{

    public function toggleLike($type, $id)
    {
        if (!in_array($type, ['post', 'comment'])) {
            return response()->json(['message' => 'Type can be only post or comment'], 404);
        }

        $model = $type === 'post' ? Post::findOrFail($id) : Comment::findOrFail($id);
        $result = $model->toggleLike(auth()->id());

        if (!array_key_exists('liked', $result)) {
            return response()->json(['message' => 'An unexpected error occurred'], 500);
        }

        return response()->json(['message' => $result['message']]);
    }

}
