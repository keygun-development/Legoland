<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persons = rand(1,10);
        DB::table('accommodations')->insert([
            'name' => $persons.' Persoons kamer',
            'description' => $persons.' Persoons kamer voor '.$persons.' personen, lekker ruim!',
            'details' => '[{"name": "Keuken", "value": true}, {"name": "Televisie", "value": true}]',
            'price' => rand(10,100),
            'imageUrl' => '/images/hotelkamer.jpg'
        ]);
    }
}
