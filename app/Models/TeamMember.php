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
