<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
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
        $user = User::with(['posts' => function ($query) {
            $query->where('status', 'published');
        }])->find($user->id);

        return UserResource::make($user);

    }
}
