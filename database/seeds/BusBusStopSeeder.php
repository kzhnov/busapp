<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Bus;
use App\BusStop;
use Carbon\Carbon;

class BusBusStopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $bus_ids = Bus::pluck('id')->all();
        $bus_stop_ids = BusStop::pluck('id')->all();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('bus_bus_stop')->insert([
                'bus_id' => $faker->randomElement($bus_ids),
                'bus_stop_id' => $faker->randomElement($bus_stop_ids),
                'waiting_time' => rand(0, 15),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
