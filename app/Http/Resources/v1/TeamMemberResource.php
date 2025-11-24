<?php

namespace App\Http\Resources\v1;

use App\Http\Resources\BaseResource\BaseResource;
use App\Models\TeamMember;
use Illuminate\Http\Request;

/** @mixin TeamMember */
class TeamMemberResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'position' => $this->position,
            'image' => $this->image,
            'summary' => $this->summary,
            'email' => $this->email,
            'phone' => $this->phone,
            'years_of_experience' => $this->years_of_experience,
            'education' => $this->education,
            'professional_background' => $this->professional_background,
            'skills' => $this->skills,
            'practice_areas' => $this->practice_areas,
            'bar_admissions' => $this->bar_admissions,
            'languages' => $this->languages,
            'achievements' => $this->achievements,
        ];
    }
}
