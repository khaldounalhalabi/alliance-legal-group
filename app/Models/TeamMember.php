<?php

namespace App\Models;

use App\Casts\MediaCast;
use App\Casts\Translatable;
use App\Serializers\SerializedMedia;
use App\Serializers\Translatable as TranslatableSerializer;
use App\Traits\HasMedia;
use Carbon\Carbon;
use Database\Factories\TeamMemberFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property TranslatableSerializer $name
 * @property TranslatableSerializer $position
 * @property SerializedMedia $image
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @mixin Builder<TeamMember>
 * @use  HasFactory<TeamMemberFactory>
 */
class TeamMember extends Model
{
    use HasFactory;
    use HasMedia;

    public const CACHE_KEY = 'team_members';

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
        'name',
        'position',
        'image',
    ];

    protected function casts(): array
    {
        return [
            'name' => Translatable::class,
            'position' => Translatable::class,
            'image' => MediaCast::class,
        ];
    }

    public function exportable(): array
    {
        return [
            'name',
            'position',
            'image',

        ];
    }

    public static function searchableArray(): array
    {
        return [
            'name',
            'position',

        ];
    }

    public static function relationsSearchableArray(): array
    {
        return [

        ];
    }
}
