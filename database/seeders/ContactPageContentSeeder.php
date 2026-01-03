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
        ContactPageContent::updateOrCreate([
            'key' => ContactUsContentKeyEnum::ADDRESS->value,
            'value' => '5 Union Street, Ardwick, Manchester, M12 4JD',
        ]);

        ContactPageContent::updateOrCreate([
            'key' => ContactUsContentKeyEnum::EMAIL->value,
            'value' => 'info@alliancelegalgroup.co.uk',
        ]);

        ContactPageContent::updateOrCreate([
            'key' => ContactUsContentKeyEnum::PHONE->value,
            'value' => '+44 0161 260 1985',
        ]);

        ContactPageContent::updateOrCreate([
            'key' => ContactUsContentKeyEnum::LOCATION_LAT->value,
            'value' => '40.712784',
        ]);

        ContactPageContent::updateOrCreate([
            'key' => ContactUsContentKeyEnum::LOCATION_LNG->value,
            'value' => '-74.005941',
        ]);

        ContactPageContent::updateOrCreate([
            'key' => ContactUsContentKeyEnum::WHATSAPP->value,
            'value' => '+44 744 952 5423',
        ]);
    }
}
