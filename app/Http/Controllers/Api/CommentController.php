<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteCommentRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        return CommentResource::make($post->comments);
    }

    public function store(StoreCommentRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['post_id'] = $request->route('post');
        return Comment::create($validated);
    }

    public function update(UpdateCommentRequest $request)
    {
        $comment = Comment::findOrFail($request->route('comment'));
        $updated = $comment->update($request->validated());
        return response()->json($updated ? $comment : ['message' => 'Update failed'], $updated ? 200 : 400);
    }

    public function destroy(DeleteCommentRequest $request)
    {
        $comment = Comment::findOrFail($request->route('comment'));
        $deleted = $comment->delete();
        return response()->json($deleted ? ['message' => 'Comment deleted successfully'] : ['message' => 'Comment delete failed'], $deleted ? 200 : 400);

    }
}
