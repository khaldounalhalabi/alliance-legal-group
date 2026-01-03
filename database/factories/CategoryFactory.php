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
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    public function definition(): array
    {
        /** @var SplFileInfo $file */
        $file = fake()->randomElement(File::allFiles(storage_path('/app/private/required/services')));

        return [
            'name'        => Translatable::fake()->toJson(),
            'description' => Translatable::create([
                'en' => $this->faker->longHtmlContent(),
                'ar' => $this->faker->longHtmlContent(),
            ]),
            'cover'          => new UploadedFile($file->getPathname(), $file->getFilename()),
            'cover_sentence' => Translatable::fake('sentence')->toJson(),
        ];
    }

    public function withServices(int $count = 1): static
    {
        return $this->afterCreating(function (Category $category) use ($count) {
            Service::factory($count)->create([
                'category_id' => $category->id,
            ]);
        });
    }
}
