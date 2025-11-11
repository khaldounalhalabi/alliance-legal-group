<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Message>
 */
class MessageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'message' => fake()->text(),
        ];
    }
}
