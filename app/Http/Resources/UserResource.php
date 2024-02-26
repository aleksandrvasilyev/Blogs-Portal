<?php

namespace App\Http\Resources;

use App\Models\Achievement;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'description' => $this->description,
            'email_verified_at' => $this->email_verified_at,
            'photo' => $this->photo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'posts' => PostResource::collection($this->whenLoaded('posts')),
            'achievements' => $this->achievements,

        ];
    }
}
