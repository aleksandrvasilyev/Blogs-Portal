<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GroupPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Group $group): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Group $group): bool
    {
        return $user->id === $group->user_id;

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Group $group): bool
    {
        return $user->id === $group->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Group $group): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Group $group): bool
    {
        //
    }

    public function add(User $user, Group $group, Post $post)
    {
        return $user->id === $post->user_id && $post->user_id === $group->user_id;

    }
    public function remove(User $user, Group $group, Post $post)
    {
        return $user->id === $post->user_id && $post->user_id === $group->user_id;
    }
}
