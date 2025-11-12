<?php

namespace App\Models;

use App\Casts\MediaCast;
use App\Casts\Translatable;
use App\Serializers\Translatable as TranslatableSerializer;
use App\Traits\HasMedia;
use Carbon\Carbon;
use Database\Factories\ServiceFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int                                                             $id
 * @property TranslatableSerializer                                          $name
 * @property TranslatableSerializer                                          $description
 * @property int                                                             $category_id
 * @property array{url:string,size:string,extension:string,mime_type:string} $cover
 * @property array{url:string,size:string,extension:string,mime_type:string} $image
 * @property Category|null                                                   $category
 * @property Carbon                                                          $created_at
 * @property Carbon                                                          $updated_at
 * @mixin Builder<Service>
 * @use  HasFactory<ServiceFactory>
 */
class Service extends Model
{
    use HasFactory;
    use HasMedia;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'cover',
        'image',

    ];

    public static function searchableArray(): array
    {
        return [
            'name',
            'description',

        ];
    }

    public static function relationsSearchableArray(): array
    {
        return [
            'category' => ['name', 'description'],

        ];
    }

    public function exportable(): array
    {
        return [
            'name',
            'description',
            'cover',
            'image',
            'category.name',

        ];
    }

    /**
     * @return  BelongsTo<Category, static>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected function casts(): array
    {
        return [
            'name' => Translatable::class,
            'description' => Translatable::class,
            'cover' => MediaCast::class,
            'image' => MediaCast::class,
        ];
    }
}
