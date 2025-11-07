<?php

namespace Database\Factories;

use App\Models\TeamMember;
use App\Serializers\Translatable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends Factory<TeamMember>
 */
class TeamMemberFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => Translatable::fake('name')->toJson(),
            'position' => Translatable::fake()->toJson(),
            'image' => new UploadedFile(public_path("assets/images/team-" . fake()->numberBetween(1, 3) . ".jpg"), "profile-image.jpg"),
        ];
    }
}
