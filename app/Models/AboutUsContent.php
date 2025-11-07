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

    public const CACHE_KEY = 'about_us_contents';

    protected static function booted(): void
    {
        parent::booted();

        self::created(function () {
            cache()->forget(self::CACHE_KEY);
        });

        self::updated(function () {
            cache()->forget(self::CACHE_KEY);
        });

        self::deleted(function () {
            cache()->forget(self::CACHE_KEY);
        });
    }

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
