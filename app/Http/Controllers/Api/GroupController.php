<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Resources\PostResource;
use App\Models\Group;
use App\Models\Post;

class GroupController extends Controller
{
    public function store(StoreGroupRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $group = auth()->user()->groups()->create($validated);
        return response()->json($group, 201);
    }

    public function destroy(Group $group)
    {
        $this->authorize('delete', $group);
        $deleted = $group->delete();
        return response()->json(['message' => $deleted ? 'Deleted successfully' : 'Delete failed'], $deleted ? 200 : 400);
    }

    public function add(Group $group, Post $post)
    {
        $this->authorize('add', [$group, $post]);
        $updated = $post->update(['group_id' => $group->id]);
        return response()->json($updated ? PostResource::make($post) : ['message' => 'Update failed'], $updated ? 200 : 400);
    }

    public function remove(Group $group, Post $post)
    {
        $this->authorize('remove', [$group, $post]);
        $updated = $post->update(['group_id' => null]);
        return response()->json($updated ? PostResource::make($post) : ['message' => 'Update failed'], $updated ? 200 : 400);
    }

    public function show(Group $group)
    {
        $group = Group::find($group->id);
        return response()->json($group->posts->count() === 0 ? ['message' => 'Group is empty'] : $group->posts);
    }
}
