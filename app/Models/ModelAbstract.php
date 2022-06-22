<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class ModelAbstract extends Model
{
    abstract static public function getType();

    abstract static public function resolveUrl();
}
