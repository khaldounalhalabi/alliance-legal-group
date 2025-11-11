<?php

namespace App\Http\Requests\v1\Message;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'phone' => ['required', 'string', 'max:255', 'min:3', 'phone:INTERNATIONAL'],
            'address' => ['required', 'string', 'max:255', 'min:3'],
            'message' => ['required', 'max:5000', 'min:0'],
        ];
    }
}
