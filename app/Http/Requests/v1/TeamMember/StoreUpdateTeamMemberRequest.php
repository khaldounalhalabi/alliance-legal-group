<?php

namespace App\Http\Requests\v1\TeamMember;

use App\Rules\ValidTranslatableJson;
use App\Serializers\SerializedMedia;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateTeamMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['json', new ValidTranslatableJson, 'required'],
            'position' => ['json', new ValidTranslatableJson, 'required'],
            'summary' => ['json', new ValidTranslatableJson, 'nullable'],
            'education' => ['json', new ValidTranslatableJson, 'nullable'],
            'professional_background' => ['json', new ValidTranslatableJson, 'nullable'],
            'skills' => ['nullable', 'array'],
            'skills.*' => ['string', 'max:255'],
            'practice_areas' => ['nullable', 'array'],
            'practice_areas.*' => ['string', 'max:255'],
            'bar_admissions' => ['nullable', 'array'],
            'bar_admissions.*' => ['string', 'max:255'],
            'languages' => ['nullable', 'array'],
            'languages.*' => ['string', 'max:100'],
            'achievements' => ['nullable', 'array'],
            'achievements.*' => ['string', 'max:500'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'years_of_experience' => ['nullable', 'integer', 'min:0', 'max:100'],
            'image' => [
                'nullable',
                Rule::when(is_array($this->input('image')), [
                    SerializedMedia::validator(),
                ]),
                Rule::when($this->hasFile('image'), [
                    'image:allow_svg', 'max:10000', 'mimes:jpeg,png,jpg,gif,svg,webp',
                ]),
            ],
        ];
    }
}
