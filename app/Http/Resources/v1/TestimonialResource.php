<?php

namespace App\Http\Resources\v1;

use App\Http\Resources\BaseResource\BaseResource;
use App\Models\Testimonial;
use Illuminate\Http\Request;

/** @mixin Testimonial */
class TestimonialResource extends BaseResource
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
            'customer_name' => $this->customer_name,
            'customer_position' => $this->customer_position,
            'testimonial' => $this->testimonial,
        ];
    }
}
