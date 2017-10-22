<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BusStopsTableSeeder::class);
        $this->call(BusesTableSeeder::class);
        $this->call(BusBusStopSeeder::class);
    }
}
