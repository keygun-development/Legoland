<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class ModelAbstract extends Model
{
    abstract protected function getType();
}
