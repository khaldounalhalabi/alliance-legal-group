<?php

namespace Database\Factories;

use App\Models\ContactPageContent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ContactPageContent>
 */
class ContactPageContentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'key' => fake()->unique()->word(),
            'value' => fake()->text(),
        ];
    }
}
