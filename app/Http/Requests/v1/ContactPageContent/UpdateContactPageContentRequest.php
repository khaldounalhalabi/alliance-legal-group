<?php

namespace App\Http\Requests\v1\ContactPageContent;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactPageContentRequest extends FormRequest
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
            'value' => ['required', 'max:5000', 'min:0'],
        ];
    }
}
