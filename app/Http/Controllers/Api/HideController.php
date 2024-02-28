<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class HideController extends Controller
{
    public function toggleHide($type, $id)
    {
        if (!in_array($type, ['category', 'tag', 'user'])) {
            return response()->json(['message' => 'Type can be only category, tag or user'], 404);
        }

        switch ($type) {
            case 'category':
                $model = Category::findOrFail($id);
                break;
            case 'tag':
                $model = Tag::findOrFail($id);
                break;
            case 'user':
                $model = User::findOrFail($id);
                if ($model->id === auth()->id()) {
                    return response()->json(['message' => 'You cannot hide yourself'], 400);
                }
                break;
        }
        $result = $model->toggleHide(auth()->id());
//        dd($result);
        if (!array_key_exists('hided', $result)) {
            return response()->json(['message' => 'An unexpected error occurred'], 500);
        }

        return response()->json(['message' => $result['message']]);
    }

}
