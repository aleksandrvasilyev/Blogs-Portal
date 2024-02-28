<?php

namespace App\Traits;

trait Hideable
{
    public function toggleHide($userId)
    {
        $hide = $this->hides()->where('user_id', $userId)->first();

        if ($hide) {
            $hide->delete();
            return ['hided' => false, 'message' => 'You have unhide this item'];
        } else {

            $this->hides()->create(['user_id' => $userId]);
            return ['hided' => true, 'message' => 'You are now hiding this item'];
        }
    }
}
