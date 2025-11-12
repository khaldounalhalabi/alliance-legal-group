<?php

namespace App\Models;

use App\Casts\MediaCast;
use App\Casts\Translatable;
use App\Serializers\Translatable as TranslatableSerializer;
use App\Traits\HasMedia;
use Carbon\Carbon;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property TranslatableSerializer $name
 * @property TranslatableSerializer $description
 * @property array{url:string,size:string,extension:string,mime_type:string} $cover
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @mixin Builder<Category>
 * @use  HasFactory<CategoryFactory>
 */
class Category extends Model
{
    use HasFactory;
    use HasMedia;

    protected $fillable = [
        'name',
        'description',
        'cover',
    ];

    protected function casts(): array
    {
        return [
            'name' => Translatable::class,
            'description' => Translatable::class,
            'cover' => MediaCast::class,
        ];
    }

    public function exportable(): array
    {
        return [
            'name',
            'description',
            'cover',
            'service_ids',
        ];
    }

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

        ];
    }
}
