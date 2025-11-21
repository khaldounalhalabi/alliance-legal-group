<?php

namespace App\Http\Requests\v1\FrequentlyAskedQuestion;

use App\Rules\ValidTranslatableJson;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFrequentlyAskedQuestionRequest extends FormRequest
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
            'question' => [
                'json', new ValidTranslatableJson([
                    'string', 'max:120',
                ]), 'required',
            ],
            'answer' => ['json', new ValidTranslatableJson, 'required'],
        ];
    }
}
