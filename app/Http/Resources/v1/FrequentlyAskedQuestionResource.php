<?php

namespace App\Http\Resources\v1;

use App\Http\Resources\BaseResource\BaseResource;
use App\Models\FrequentlyAskedQuestion;
use Illuminate\Http\Request;

/** @mixin FrequentlyAskedQuestion */
class FrequentlyAskedQuestionResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'answer' => $this->answer,
        ];
    }
}
