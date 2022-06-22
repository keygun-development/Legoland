<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accommodation extends ModelAbstract
{
    use HasFactory;

    public static function getType(): string
    {
        return 'accommodations';
    }

    public static function resolveUrl(): string
    {
        return 'accommodation';
    }
}
