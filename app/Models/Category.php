<?php

namespace App\Models;

use App\Casts\MediaCast;
use App\Casts\Translatable;
use App\Serializers\Translatable as TranslatableSerializer;
use App\Traits\HasMedia;
use Carbon\Carbon;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int                                                             $id
 * @property TranslatableSerializer                                          $name
 * @property TranslatableSerializer                                          $cover_sentence
 * @property TranslatableSerializer                                          $description
 * @property array{url:string,size:string,extension:string,mime_type:string} $cover
 * @property Carbon                                                          $created_at
 * @property Carbon                                                          $updated_at
 * @mixin Builder<Category>
 * @use  HasFactory<CategoryFactory>
 * @property EloquentCollection<Service>|null                                $services
 */
class Category extends Model
{
    use HasFactory;
    use HasMedia;
    protected $fillable = [
        'name',
        'description',
        'cover',
        'cover_sentence'
    ];

    public static function searchableArray(): array
    {
        return [
            'name',
            'description',
            'cover_sentence',
        ];
    }

    public static function relationsSearchableArray(): array
    {
        return [
            'services' => [
                'name',
                'description',
            ],
        ];
    }

    public function exportable(): array
    {
        return [
            'name',
            'description',
            'cover',
            'service_ids',
            'cover_sentence',
        ];
    }

    /**
     * @return  HasMany<Service, static>
     */
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    protected function casts(): array
    {
        return [
            'name' => Translatable::class,
            'description' => Translatable::class,
            'cover' => MediaCast::class,
            'cover_sentence' => Translatable::class,
        ];
    }
}
