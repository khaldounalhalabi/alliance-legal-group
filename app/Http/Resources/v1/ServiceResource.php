<?php

namespace App\Http\Resources\v1;

use App\Http\Resources\BaseResource\BaseResource;
use App\Models\Service;
use Illuminate\Http\Request;

/** @mixin Service */
class ServiceResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'cover' => $this->cover,
            'image' => $this->image,
        ];
    }
}
