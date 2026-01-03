<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->create([
                'first_name' => 'Ali',
                'last_name'  => 'Taleb',
                'email'      => 'ali@alliancelegalgroup.com',
                'password'   => '123456789',
            ]);

        $this->call([
            AboutUsContentSeeder::class,
            TeamMemberSeeder::class,
            TestimonialSeeder::class,
            MessageSeeder::class,
            ContactPageContentSeeder::class,
            CategorySeeder::class,
            BlogPostSeeder::class,
            FrequentlyAskedQuestionSeeder::class,
            AddressSeeder::class,
        ]);
    }
}
