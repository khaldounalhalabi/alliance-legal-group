<?php

namespace Database\Seeders;

use App\Models\FrequentlyAskedQuestion;
use Illuminate\Database\Seeder;

class FrequentlyAskedQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FrequentlyAskedQuestion::factory(10)->create();
    }
}
