<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Accommodation extends Model
{
    use HasFactory;
    private string $name;
    private string $imageUrl;
    private string $description;
    private string $details;
    private string $price;

    public function __construct()
    {
        $this->name = DB::table('accommodations')->value('title');
        $this->imageUrl = DB::table('accommodations')->value('imageUrl');
        $this->description = DB::table('accommodations')->value('description');
        $this->details = DB::table('accommodations')->value('details');
        $this->price = DB::table('accommodations')->value('price');
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDetails(): string
    {
        return $this->details;
    }

    public function getprice(): string
    {
        return $this->price;
    }

    public function getType(): string
    {
        return 'accommodation';
    }
}
