<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Accommodation extends ModelAbstract
{
    use HasFactory;
    private int $id;
    private string $name;
    private string $imageUrl;
    private string $description;
    private string $details;
    private string $price;

    public function __construct()
    {
        $this->id = DB::table('accommodations')->value('id');
        $this->name = DB::table('accommodations')->value('title');
        $this->imageUrl = DB::table('accommodations')->value('imageUrl');
        $this->description = DB::table('accommodations')->value('description');
        $this->details = DB::table('accommodations')->value('details');
        $this->price = DB::table('accommodations')->value('price');
    }

    public function getId(): string
    {
        return $this->id;
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

    public function getSelectedAccommodations(): ?array
    {
        if(isset($_COOKIE[$this->getType()])) {
            $getaccommodations = json_decode($_COOKIE[$this->getType()]);
            $accommodations = [];
            foreach ($getaccommodations as $acc) {
                array_push($accommodations, Accommodation::find($acc->id));
            }
            return $accommodations;
        } else {
            return null;
        }
    }

    public function getAccommodationAmounts(): ?array
    {
        if(isset($_COOKIE[$this->getType()])) {
            $getaccommodations = json_decode($_COOKIE[$this->getType()]);
            $accommodations = [];
            foreach ($getaccommodations as $acc) {
                array_push($accommodations, $acc->amount);
            }
            return $accommodations;
        } else {
            return null;
        }
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getType(): string
    {
        return 'accommodations';
    }
}
