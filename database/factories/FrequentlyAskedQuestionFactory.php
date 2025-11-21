<?php

namespace Database\Factories;

use App\Models\FrequentlyAskedQuestion;
use App\Serializers\Translatable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FrequentlyAskedQuestion>
 */
class FrequentlyAskedQuestionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question' => Translatable::fake('sentence')->toJson(),
            'answer' => Translatable::fake('text')->toJson(),
        ];
    }
}
