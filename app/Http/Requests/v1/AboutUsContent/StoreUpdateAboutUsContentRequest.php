<?php

namespace App\Http\Requests\v1\AboutUsContent;

use App\Rules\ValidTranslatableJson;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAboutUsContentRequest extends FormRequest
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
            'content' => ['json', new ValidTranslatableJson, 'required'],
        ];
    }
}
