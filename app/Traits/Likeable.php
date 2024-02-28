<?php

namespace App\Traits;

trait Likeable
{
    public function toggleLike($userId)
    {
        $like = $this->likes()->where('user_id', $userId)->first();

        if ($like) {
            $like->delete();
            return ['liked' => false, 'message' => 'You unliked this item'];
        } else {
            $this->likes()->create(['user_id' => $userId]);
            return ['liked' => true, 'message' => 'You liked this item'];
        }
    }
}
