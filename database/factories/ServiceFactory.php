<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Service;
use App\Serializers\Translatable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use SplFileInfo;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    public function definition(): array
    {
        /** @var SplFileInfo $cover */
        $cover = fake()->randomElement(File::allFiles(storage_path('/app/private/required/services')));
        $image = fake()->randomElement(File::allFiles(storage_path('/app/private/required/services')));

        return [
            'name' => Translatable::fake('sentence')->toJson(),
            'description' => Translatable::fake('words')->toJson(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'cover' => new UploadedFile($cover->getPathname(), $cover->getFilename()),
            'image' => new UploadedFile($image->getPathname(), $image->getFilename()),
        ];
    }
}
