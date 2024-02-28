<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Models\Post;
use App\Models\User;

class UserController
{
    public function index()
    {
        $users = User::paginate(10);
        return UserResource::collection($users);
    }

    public function show(User $user)
    {
        if (request()->has('posts')) {

            $user = User::with(['posts' => function ($query) {
                $query->where('status', 'published');
            }])->find($user->id);

        } else {
            $user = User::find($user->id);
        }

        return UserResource::make($user);
    }

    public function update(UpdateUserRequest $request)
    {
        $user = User::find(auth()->user()->id);
        $updated = $user->update($request->validated());
        return response()->json($updated ? $user : ['message' => 'Update failed'], $updated ? 200 : 400);
    }

    public function destroy()
    {
        if (auth()->check()) {
            $user = User::find(auth()->user()->id);
            $deleted = $user->delete();
            return response()->json($deleted ? ['message' => 'User deleted successfully'] : ['message' => 'User delete failed'], $deleted ? 200 : 400);
        }
        return response()->json(['message' => 'Unauthorized']);

    }


}
