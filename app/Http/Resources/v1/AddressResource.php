<?php

namespace App\Http\Resources\v1;

use App\Http\Resources\BaseResource\BaseResource;
use App\Models\Address;
use Illuminate\Http\Request;

/** @mixin Address */
class AddressResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id,
            'country'  => $this->country,
            'city'     => $this->city,
            'address'  => $this->address,
            'map_link' => $this->map_link,
            'image'    => $this->image,
        ];
    }
}
