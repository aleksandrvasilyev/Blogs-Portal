<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\Tag;

class FollowController
{
    public function toggleFollow($type, $id)
    {
        if (!in_array($type, ['category', 'tag'])) {
            return response()->json(['message' => 'Type can be only category or tag'], 404);
        }

        $model = $type === 'category' ? Category::findOrFail($id) : Tag::findOrFail($id);
        $result = $model->toggleFollow(auth()->id());

        if (!array_key_exists('followed', $result)) {
            return response()->json(['message' => 'An unexpected error occurred'], 500);
        }

        return response()->json(['message' => $result['message']]);
    }
}
