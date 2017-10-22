<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusBusStopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_bus_stop', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bus_id')->unsigned();;
            $table->integer('bus_stop_id')->unsigned();;
            $table->integer('waiting_time')->nullable();
            $table->timestamps();

            $table->foreign('bus_id')->references('id')->on('buses');
            $table->foreign('bus_stop_id')->references('id')->on('bus_stops');
            $table->index(['bus_stop_id', 'bus_id']);
            $table->index('bus_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus_bus_stop');
    }
}
