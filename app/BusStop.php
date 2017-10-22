<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusStop extends Model
{
    //
    /**
     * The buses that belong to the bustop.
     */
    public function buses()
    {
        return $this->belongsToMany('App\Bus')->withPivot('waiting_time')->withTimestamps();
    }
}
