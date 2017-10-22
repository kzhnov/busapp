<?php

use Illuminate\Database\Seeder;

class BusStopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bus_stops')->insert([
            ['name' => 'Somerset MRT','lat' => 1.300272, 'lng' => 103.838790],
            ['name' => 'Winsland Hse','lat' => 1.299831, 'lng' => 103.840921],
            ['name' => 'Dhoby Ghaut Stn','lat' => 1.298357, 'lng' => 103.845216],
            ['name' => 'YMCA','lat' => 1.298057, 'lng' => 103.847855],
            ['name' => 'Macdonald Hse','lat' => 1.298939, 'lng' => 103.846531],
        ]);
    }
}
