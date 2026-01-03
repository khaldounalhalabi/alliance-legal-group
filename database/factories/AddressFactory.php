<?php

namespace Database\Factories;

use App\Models\Address;
use App\Serializers\Translatable;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use SplFileInfo;

/**
 * @extends Factory<Address>
 */
class AddressFactory extends Factory
{
    public function definition(): array
    {
        $lat = fake()->latitude();
        $lng = fake()->longitude();

        try {
            /** @var SplFileInfo $file */
            $index = fake()->unique()->numberBetween(1, 10);
            $file = new SplFileInfo(storage_path("/app/private/required/places/places-$index.jpg"));
        } catch (Exception) {
            $file = fake()->randomElement(File::allFiles(storage_path('/app/private/required/places')));
        }

        return [
            'country'  => Translatable::fake('country')->toJson(),
            'city'     => Translatable::fake('city')->toJson(),
            'address'  => Translatable::fake('address')->toJson(),
            'image'    => new UploadedFile($file->getPathname(), $file->getFilename()),
            'map_link' => "https://www.google.com/maps/@{$lat},{$lng},15z",
        ];
    }
}
