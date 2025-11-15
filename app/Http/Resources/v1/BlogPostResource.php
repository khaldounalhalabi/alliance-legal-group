<?php

namespace App\Http\Resources\v1;

use App\Http\Resources\BaseResource\BaseResource;
use App\Models\BlogPost;
use Illuminate\Http\Request;

/** @mixin BlogPost */
class BlogPostResource extends BaseResource
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
            'small_description' => $this->small_description,
            'content' => $this->content,
            'author_name' => $this->author_name,
            'cover' => $this->cover,
        ];
    }
}
