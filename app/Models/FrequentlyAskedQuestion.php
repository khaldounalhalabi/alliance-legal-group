<?php

namespace App\Models;

use App\Casts\Translatable;
use App\Serializers\Translatable as TranslatableSerializer;
use Carbon\Carbon;
use Database\Factories\FrequentlyAskedQuestionFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int                    $id
 * @property TranslatableSerializer $question
 * @property TranslatableSerializer $answer
 * @property Carbon                 $created_at
 * @property Carbon                 $updated_at
 * @mixin Builder<FrequentlyAskedQuestion>
 * @use  HasFactory<FrequentlyAskedQuestionFactory>
 */
class FrequentlyAskedQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',

    ];

    public static function searchableArray(): array
    {
        return [
            'question',
            'answer',

        ];
    }

    public static function relationsSearchableArray(): array
    {
        return [

        ];
    }

    public function exportable(): array
    {
        return [
            'question',
            'answer',

        ];
    }

    protected function casts(): array
    {
        return [
            'question' => Translatable::class,
            'answer' => Translatable::class,
        ];
    }
}
