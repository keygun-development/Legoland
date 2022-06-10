<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Attraction extends ModelAbstract
{
    use HasFactory;
    private string $name;
    private string $imageUrl;
    private string $description;
    private string $details;

    public function __construct()
    {
        $this->name = DB::table('attractions')->value('name');
        $this->imageUrl = DB::table('attractions')->value('imageUrl');
        $this->description = DB::table('attractions')->value('description');
        $this->details = DB::table('attractions')->value('details');
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

    public function getType(): string
    {
        return 'attraction';
    }
}
