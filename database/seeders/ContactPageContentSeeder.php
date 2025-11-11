<?php

namespace Database\Seeders;

use App\Enums\ContactUsContentKeyEnum;
use App\Models\ContactPageContent;
use Illuminate\Database\Seeder;

class ContactPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactPageContent::create([
            'key' => ContactUsContentKeyEnum::ADDRESS->value,
            'value' => '5 Union Street, Ardwick, Manchester, M12 4JD',
        ]);

        ContactPageContent::create([
            'key' => ContactUsContentKeyEnum::EMAIL->value,
            'value' => 'info@alliancelegalgroup.co.uk',
        ]);

        ContactPageContent::create([
            'key' => ContactUsContentKeyEnum::PHONE->value,
            'value' => '+44 0161 260 1985',
        ]);

        ContactPageContent::create([
            'key' => ContactUsContentKeyEnum::LOCATION_LAT->value,
            'value' => '40.712784',
        ]);

        ContactPageContent::create([
            'key' => ContactUsContentKeyEnum::LOCATION_LNG->value,
            'value' => '-74.005941',
        ]);
    }
}
