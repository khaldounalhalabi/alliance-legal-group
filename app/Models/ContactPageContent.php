<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\ContactPageContentFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property string $key
 * @property string $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @mixin Builder<ContactPageContent>
 * @use  HasFactory<ContactPageContentFactory>
 */
class ContactPageContent extends Model
{
    use HasFactory;

    public const CACHE_KEY = 'contact_us_page_content';
    protected $fillable = [
        'key',
        'value',
    ];

    public static function searchableArray(): array
    {
        return [
            'key',
            'value',

        ];
    }

    public static function relationsSearchableArray(): array
    {
        return [

        ];
    }

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

    public function exportable(): array
    {
        return [
            'key',
            'value',

        ];
    }

    protected function casts(): array
    {
        return [

        ];
    }
}
