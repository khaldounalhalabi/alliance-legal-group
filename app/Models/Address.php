<?php

namespace App\Models;

use App\Casts\MediaCast;
use App\Casts\Translatable;
use App\Serializers\Translatable as TranslatableSerializer;
use App\Traits\HasMedia;
use Carbon\Carbon;
use Database\Factories\AddressFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int                                                             $id
 * @property TranslatableSerializer                                          $country
 * @property TranslatableSerializer                                          $city
 * @property TranslatableSerializer                                          $address
 * @property string                                                          $map_link
 * @property array{url:string,size:string,extension:string,mime_type:string} $image
 * @property Carbon                                                          $created_at
 * @property Carbon                                                          $updated_at
 *
 * @mixin Builder<Address>
 *
 * @use  HasFactory<AddressFactory>
 */
class Address extends Model
{
    use HasFactory;
    use HasMedia;

    const CACHE_KEY = 'addresses';

    protected $fillable = [
        'country',
        'city',
        'address',
        'map_link',
        'image',

    ];

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

    protected function casts(): array
    {
        return [
            'country' => Translatable::class,
            'city'    => Translatable::class,
            'address' => Translatable::class,
            'image'   => MediaCast::class,
        ];
    }

    public function exportable(): array
    {
        return [
            'country',
            'city',
            'address',
            'map_link',
            'image',

        ];
    }

    public static function searchableArray(): array
    {
        return [
            'country',
            'city',
            'address',
            'map_link',

        ];
    }

    public static function relationsSearchableArray(): array
    {
        return [

        ];
    }
}
