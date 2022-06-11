<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

/**
 * @mixin Builder
 */
class Ticket extends ModelAbstract
{
    use HasFactory;
    private int $id;
    private string $name;
    private string $description;
    private string $price;

    public function __construct()
    {
        $this->id = DB::table('tickets')->value('id');
        $this->name = DB::table('tickets')->value('name');
        $this->description = DB::table('tickets')->value('description');
        $this->price = DB::table('tickets')->value('price');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public static function getType(): string
    {
        return 'tickets';
    }
}
