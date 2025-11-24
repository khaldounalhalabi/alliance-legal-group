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
 * @property int                    $id
 * @property TranslatableSerializer $name
 * @property TranslatableSerializer $position
 * @property TranslatableSerializer $summary
 * @property TranslatableSerializer $education
 * @property TranslatableSerializer $professional_background
 * @property array                  $skills
 * @property array                  $practice_areas
 * @property array                  $bar_admissions
 * @property array                  $languages
 * @property array                  $achievements
 * @property string                 $email
 * @property string                 $phone
 * @property int                    $years_of_experience
 * @property SerializedMedia        $image
 * @property Carbon                 $created_at
 * @property Carbon                 $updated_at
 * @mixin Builder<TeamMember>
 * @use  HasFactory<TeamMemberFactory>
 */
class TeamMember extends Model
{
    use HasFactory;
    use HasMedia;

    public const CACHE_KEY = 'team_members';
    protected $fillable = [
        'name',
        'position',
        'summary',
        'education',
        'professional_background',
        'skills',
        'practice_areas',
        'bar_admissions',
        'languages',
        'achievements',
        'email',
        'phone',
        'years_of_experience',
        'image',
    ];

    public static function searchableArray(): array
    {
        return [
            'name',
            'position',
            'summary',
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
            'name',
            'position',
            'summary',
            'education',
            'professional_background',
            'skills',
            'practice_areas',
            'bar_admissions',
            'languages',
            'achievements',
            'email',
            'phone',
            'years_of_experience',
            'image',

        ];
    }

    protected function casts(): array
    {
        return [
            'name' => Translatable::class,
            'position' => Translatable::class,
            'summary' => Translatable::class,
            'education' => Translatable::class,
            'professional_background' => Translatable::class,
            'skills' => 'array',
            'practice_areas' => 'array',
            'bar_admissions' => 'array',
            'languages' => 'array',
            'achievements' => 'array',
            'years_of_experience' => 'integer',
            'image' => MediaCast::class,
        ];
    }
}
