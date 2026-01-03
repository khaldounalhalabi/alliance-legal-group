<?php

namespace App\Http\Requests\v1\Address;

use App\Rules\ValidTranslatableJson;
use App\Serializers\SerializedMedia;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateAddressRequest extends FormRequest
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
            'country'  => ['json', new ValidTranslatableJson, 'required'],
            'city'     => ['json', new ValidTranslatableJson, 'required'],
            'address'  => ['json', new ValidTranslatableJson, 'required'],
            'map_link' => ['required', 'max:5000', 'min:0', 'url'],
            'image'    => [
                'required',
                Rule::when(is_array($this->input('image')), [
                    SerializedMedia::validator(),
                ]),
                Rule::when($this->hasFile('image'), [
                    'image:allow_svg',
                    'max:10000',
                    'mimes:jpeg,png,jpg,gif,svg,webp',
                ]),
            ],
        ];
    }
}
