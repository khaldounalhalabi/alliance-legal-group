<?php

namespace App\Http\Requests\v1\Category;

use App\Rules\ValidTranslatableJson;
use App\Serializers\SerializedMedia;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateCategoryRequest extends FormRequest
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
            'name' => ['json', new ValidTranslatableJson(['string', 'max:75', 'min:3']), 'required'],
            'cover_sentence' => ['json', new ValidTranslatableJson(['string', 'max:75', 'min:3']), 'required'],
            'description' => ['json', new ValidTranslatableJson(['string']), 'required'],
            'cover' => [
                'required',
                Rule::when(is_array($this->input('cover')), [
                    SerializedMedia::validator()
                ]),
                Rule::when($this->hasFile('cover'), [
                    'image:allow_svg',
                    'max:10000',
                    'mimes:jpeg,png,jpg,gif,svg,webp'
                ])
            ],
        ];
    }
}
