<?php

namespace Database\Factories;

use App\Models\Testimonial;
use App\Serializers\Translatable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends Factory<Testimonial>
 */
class TestimonialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'customer_name' => Translatable::fake('name')->toJson(),
            'customer_position' => Translatable::fake()->toJson(),
            'testimonial' => Translatable::fake('text')->toJson(),
            'customer_image' => new UploadedFile(public_path("assets/images/team-" . fake()->numberBetween(1, 3) . ".jpg"), "profile-image.jpg"),
        ];
    }
}
