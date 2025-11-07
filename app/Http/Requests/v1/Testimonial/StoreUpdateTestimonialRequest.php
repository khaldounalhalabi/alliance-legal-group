<?php

namespace App\Http\Requests\v1\Testimonial;

use App\Rules\ValidTranslatableJson;
use App\Serializers\SerializedMedia;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateTestimonialRequest extends FormRequest
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
            'customer_name' => ['json', new ValidTranslatableJson, 'required'],
            'customer_position' => ['json', new ValidTranslatableJson, 'nullable'],
            'testimonial' => ['json', new ValidTranslatableJson, 'required'],
            'customer_image' => [
                'nullable',
                Rule::when(is_array($this->input('customer_image')), [
                    SerializedMedia::validator()
                ]),
                Rule::when($this->hasFile('customer_image'), [
                    'image:allow_svg', 'max:10000', 'mimes:jpeg,png,jpg,gif,svg,webp'
                ])
            ],
        ];
    }
}
