<?php

namespace App\Models;

use App\Casts\MediaCast;
use App\Casts\Translatable;
use App\Serializers\Translatable as TranslatableSerializer;
use App\Traits\HasMedia;
use Carbon\Carbon;
use Database\Factories\BlogPostFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property TranslatableSerializer $title
 * @property TranslatableSerializer $small_description
 * @property TranslatableSerializer $content
 * @property TranslatableSerializer $author_name
 * @property array{url:string,size:string,extension:string,mime_type:string} $cover
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @mixin Builder<BlogPost>
 * @use  HasFactory<BlogPostFactory>
 */
class BlogPost extends Model
{
    use HasFactory;
    use HasMedia;

    protected $fillable = [
        'title',
        'small_description',
        'content',
        'author_name',
        'cover',
    ];

    protected function casts(): array
    {
        return [
            'title' => Translatable::class,
            'small_description' => Translatable::class,
            'content' => Translatable::class,
            'author_name' => Translatable::class,
            'cover' => MediaCast::class,
        ];
    }

    public function exportable(): array
    {
        return [
            'title',
            'small_description',
            'content',
            'author_name',
            'cover',
        ];
    }

    public static function searchableArray(): array
    {
        return [
            'title',
            'small_description',
            'content',
            'author_name',
        ];
    }

    public static function relationsSearchableArray(): array
    {
        return [];
    }
}
