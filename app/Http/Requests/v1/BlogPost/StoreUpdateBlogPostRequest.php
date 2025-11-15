<?php

namespace App\Http\Requests\v1\BlogPost;

use App\Rules\ValidTranslatableJson;
use App\Serializers\SerializedMedia;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateBlogPostRequest extends FormRequest
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
            'title' => ['json', new ValidTranslatableJson(['string', 'max:75']), 'required'],
            'small_description' => ['json', new ValidTranslatableJson(['string', 'max:75']), 'required'],
            'content' => ['json', new ValidTranslatableJson(['string']), 'required'],
            'author_name' => ['json', new ValidTranslatableJson(['max:50']), 'required'],
            'cover' => [
                'required',
                Rule::when(is_array($this->input('cover')), [
                    SerializedMedia::validator(),
                ]),
                Rule::when($this->hasFile('cover'), [
                    'image:allow_svg',
                    'max:10000',
                    'mimes:jpeg,png,jpg,gif,svg,webp',
                ]),
            ],
        ];
    }
}
