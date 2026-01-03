<?php

namespace Database\Factories;

use App\Models\Testimonial;
use App\Serializers\Translatable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Testimonial>
 */
class TestimonialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'customer_name'     => Translatable::fake('name')->toJson(),
            'customer_position' => Translatable::fake()->toJson(),
            'testimonial'       => Translatable::fake('text')->toJson(),
        ];
    }
}
