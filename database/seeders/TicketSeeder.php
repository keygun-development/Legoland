<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->insert([
            'name' => 'Volwassenkaart',
            'description' => 'Voor volwassenen vanaf 16 jaar t/m 65 jaar',
            'price' => rand(1,20)
        ]);
    }
}
