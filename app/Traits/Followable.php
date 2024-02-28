<?php

namespace App\Traits;

trait Followable
{
    public function toggleFollow($userId)
    {
        $follow = $this->follows()->where('user_id', $userId)->first();

        if ($follow) {
            $follow->delete();
            return ['followed' => false, 'message' => 'You have unfollowed this item'];
        } else {

            $this->follows()->create(['user_id' => $userId]);
            return ['followed' => true, 'message' => 'You are now following this item'];
        }
    }
}
