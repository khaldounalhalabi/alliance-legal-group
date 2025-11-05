<?php

namespace App\Models;

use App\Casts\Translatable;
use App\Serializers\Translatable as TranslatableSerializer;
use Carbon\Carbon;
use Database\Factories\AboutUsContentFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $type
 * @property TranslatableSerializer $content
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @mixin Builder<AboutUsContent>
 * @use  HasFactory<AboutUsContentFactory>
 */
class AboutUsContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'content',
    ];

    protected function casts(): array
    {
        return [
            'content' => Translatable::class,
        ];
    }

    public function exportable(): array
    {
        return [
            'type',
            'content',
        ];
    }

    public static function searchableArray(): array
    {
        return [
            'type',
            'content',
        ];
    }

    public static function relationsSearchableArray(): array
    {
        return [

        ];
    }
}
