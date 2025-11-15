<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\BlogPostSeeder;

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
                'last_name' => 'Taleb',
                'email' => 'ali@alliance-legal-group.com',
                'password' => '123456789',
            ]);

        $this->call([
            AboutUsContentSeeder::class,
            TeamMemberSeeder::class,
            TestimonialSeeder::class,
            MessageSeeder::class,
            ContactPageContentSeeder::class,
            CategorySeeder::class,
            BlogPostSeeder::class,
        ]);
    }
}
