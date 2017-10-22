<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    /**
     * The busstops that belong to the bus.
     */
    public function bus_stops()
    {
        return $this->belongsToMany('App\BusStop');
    }
}
