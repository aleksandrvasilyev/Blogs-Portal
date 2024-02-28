<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
            'thumbnail' => $this->thumbnail,
            'status' => $this->status,
            'pinned' => (bool) $this->pinned,
            'edited' => (bool) $this->edited,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->author->id,
            'author' => new AuthorResource($this->whenLoaded('author')),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'group' => new GroupResource($this->whenLoaded('group')),
            'tags' => new TagResource($this->whenLoaded('tags')),
            'comments' => new CommentResource($this->whenLoaded('comments')),
            'likes' => new LikeResource($this->whenLoaded('likes')),
            'favorites' => new FavoriteResource($this->whenLoaded('favorites')),
        ];
    }
}
