<?php

namespace Database\Factories;

use App\Models\AboutUsContent;
use App\Serializers\Translatable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AboutUsContent>
 */
class AboutUsContentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type' => fake()->unique()->word(),
            'content' => Translatable::fake('sentence')->toJson(),
        ];
    }
}
