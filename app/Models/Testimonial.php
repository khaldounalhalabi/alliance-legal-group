<?php

namespace App\Models;

use App\Casts\Translatable;
use App\Serializers\Translatable as TranslatableSerializer;
use App\Traits\HasMedia;
use Carbon\Carbon;
use Database\Factories\TestimonialFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int                         $id
 * @property TranslatableSerializer      $customer_name
 * @property TranslatableSerializer|null $customer_position
 * @property TranslatableSerializer      $testimonial
 * @property Carbon                      $created_at
 * @property Carbon                      $updated_at
 *
 * @mixin Builder<Testimonial>
 *
 * @use  HasFactory<TestimonialFactory>
 */
class Testimonial extends Model
{
    use HasFactory;
    use HasMedia;

    public const CACHE_KEY = 'testimonials';

    protected $fillable = [
        'customer_name',
        'customer_position',
        'testimonial',
    ];

    public static function searchableArray(): array
    {
        return [
            'customer_name',
            'customer_position',
            'testimonial',
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
            'customer_name',
            'customer_position',
            'testimonial',
        ];
    }

    protected function casts(): array
    {
        return [
            'customer_name' => Translatable::class,
            'customer_position' => Translatable::class,
            'testimonial' => Translatable::class,
        ];
    }
}
