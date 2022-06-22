<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin Builder
 */
class Ticket extends ModelAbstract
{
    use HasFactory;

    public static function getType(): string
    {
        return 'tickets';
    }

    static public function resolveUrl(): string
    {
        return 'tickets';
    }
}
