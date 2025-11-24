<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use App\Serializers\Translatable;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamMember::factory()->create([
            'name' => Translatable::create([
                'en' => 'Ali Taleb',
                'ar' => 'علي طالب',
            ]),
            'position' => Translatable::create([
                'en' => 'Director of International Legal Affairs',
                'ar' => 'مدير العلاقات الدولية',
            ]),
            'image' => new UploadedFile(public_path("assets/images/team-".fake()->numberBetween(1, 3).".jpg"),
                "profile-image.jpg"),
        ]);

        TeamMember::factory()->create([
            'name' => Translatable::create([
                'en' => 'Mohammad Albandar',
                'ar' => 'محمد البندر',
            ]),
            'position' => Translatable::create([
                'en' => 'Managing Partner',
                'ar' => 'مدير مشارك',
            ]),
            'image' => new UploadedFile(public_path("assets/images/team-".fake()->numberBetween(1, 3).".jpg"),
                "profile-image.jpg"),
        ]);

        TeamMember::factory()->create([
            'name' => Translatable::create([
                'en' => 'Sultan H Alshimarry',
                'ar' => 'سلطان الشمري',
            ]),
            'position' => Translatable::create([
                'en' => 'Associate',
                'ar' => 'مساعد',
            ]),
            'image' => new UploadedFile(public_path("assets/images/team-".fake()->numberBetween(1, 3).".jpg"),
                "profile-image.jpg"),
        ]);

        TeamMember::factory()->create([
            'name' => Translatable::create([
                'en' => 'Nour Al-malik',
                'ar' => 'نور الملك',
            ]),
            'position' => Translatable::create([
                'en' => 'Senior Attorney',
                'ar' => 'محامي محترف',
            ]),
            'image' => new UploadedFile(public_path("assets/images/team-".fake()->numberBetween(1, 3).".jpg"),
                "profile-image.jpg"),
        ]);

        TeamMember::factory()->create([
            'name' => Translatable::create([
                'en' => 'Amir Obeid',
                'ar' => 'أمير عبيد',
            ]),
            'position' => Translatable::create([
                'en' => 'Senior Attorney',
                'ar' => 'محامي محترف',
            ]),
            'image' => new UploadedFile(public_path("assets/images/team-".fake()->numberBetween(1, 3).".jpg"),
                "profile-image.jpg"),
        ]);

        TeamMember::factory()->create([
            'name' => Translatable::create([
                'en' => 'Patrick Sweeny',
                'ar' => 'باتريك سويني',
            ]),
            'position' => Translatable::create([
                'en' => 'Partner Lawyer Ireland',
                'ar' => 'Partner Lawyer Ireland',
            ]),
            'image' => new UploadedFile(public_path("assets/images/team-".fake()->numberBetween(1, 3).".jpg"),
                "profile-image.jpg"),
        ]);

        TeamMember::factory()->create([
            'name' => Translatable::create([
                'en' => 'Simon Holland',
                'ar' => 'Simon Holland',
            ]),
            'position' => Translatable::create([
                'en' => 'Junior Associate',
                'ar' => 'Junior Associate',
            ]),
            'image' => new UploadedFile(public_path("assets/images/team-".fake()->numberBetween(1, 3).".jpg"),
                "profile-image.jpg"),
        ]);

        TeamMember::factory()->create([
            'name' => Translatable::create([
                'en' => 'Emily Stevenson',
                'ar' => 'Emily Stevenson',
            ]),
            'position' => Translatable::create([
                'en' => 'Senior Attorney',
                'ar' => 'Senior Attorney',
            ]),
            'image' => new UploadedFile(public_path("assets/images/team-".fake()->numberBetween(1, 3).".jpg"),
                "profile-image.jpg"),
        ]);

        TeamMember::factory()->create([
            'name' => Translatable::create([
                'en' => 'Hanna Colman',
                'ar' => 'Hanna Colman',
            ]),
            'position' => Translatable::create([
                'en' => 'Equity Partner',
                'ar' => 'Equity Partner',
            ]),
            'image' => new UploadedFile(public_path("assets/images/team-".fake()->numberBetween(1, 3).".jpg"),
                "profile-image.jpg"),
        ]);
    }
}
