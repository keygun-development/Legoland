<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attraction extends ModelAbstract
{
    use HasFactory;

    public static function getType(): string
    {
        return 'attracties';
    }
}
