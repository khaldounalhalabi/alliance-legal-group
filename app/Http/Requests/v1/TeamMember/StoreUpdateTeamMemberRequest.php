<?php

namespace App\Http\Requests\v1\TeamMember;

use App\Rules\ValidTranslatableJson;
use Illuminate\Foundation\Http\FormRequest;

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
            'image' => ['required', 'image', 'max:10000', 'mimes:jpeg,png,jpg,gif,svg,webp'],
        ];
    }
}
