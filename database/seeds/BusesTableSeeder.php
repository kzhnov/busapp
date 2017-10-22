<?php

use Illuminate\Database\Seeder;

class BusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('buses')->insert([
            ['name' => '147'],
            ['name' => '195'],
            ['name' => '14'],
            ['name' => '16'],
            ['name' => '851'],
        ]);
    }
}
