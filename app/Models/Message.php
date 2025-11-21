<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\MessageFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $message
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @mixin Builder<Message>
 * @use  HasFactory<MessageFactory>
 */
class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'message',

    ];

    public static function searchableArray(): array
    {
        return [
            'name',
            'phone',
            'address',
            'message',

        ];
    }

    public static function relationsSearchableArray(): array
    {
        return [

        ];
    }

    public function exportable(): array
    {
        return [
            'name',
            'phone',
            'address',
            'message',

        ];
    }

    protected function casts(): array
    {
        return [

        ];
    }
}
