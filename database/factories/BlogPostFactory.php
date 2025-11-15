<?php

namespace Database\Factories;

use App\Models\BlogPost;
use App\Serializers\Translatable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use SplFileInfo;

/**اي 
 * @extends Factory<BlogPost>
 */
class BlogPostFactory extends Factory
{
    public function definition(): array
    {
        /** @var SplFileInfo $file */
        $file = fake()->randomElement(File::allFiles(storage_path('/app/private/required/services')));

        return [
            'title' => Translatable::fake('word')->toJson(),
            'small_description' => Translatable::fake('word')->toJson(),
            'content' => Translatable::create([
                'en' => $this->faker->longHtmlContent(),
                'ar' => $this->faker->longHtmlContent(),
            ]),
            'author_name' => Translatable::fake('word')->toJson(),
            'cover' => new UploadedFile($file->getPathname(), $file->getFilename()),
        ];
    }
}
