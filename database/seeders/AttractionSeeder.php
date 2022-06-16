<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attractions')->insert([
            'name' => 'Attractie',
            'description' => 'Hele leuke attractie!',
            'details' => '[{"name": "Snelheid", "value": "80km/u"}, {"name": "G-krachten", "value": "5"}]',
            'imageUrl' => '/images/achtbaan.jpg'
        ]);
    }
}
