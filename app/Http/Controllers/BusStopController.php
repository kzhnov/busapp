<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusStop;
use Illuminate\Support\Facades\DB;

class BusStopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bus_stops = BusStop::all();
        return view('busstoplist', ['bus_stops' => $bus_stops, "title" => "Bus Stops List"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $bus_stops = BusStop::all();
        return view('busstop', ['bus_stops' => $bus_stops]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get the nearest bus stop based on current location
     *
     * @param  Illuminate\Http\Request  $request
     * @param  float  $lat
     * @param  float  $lng
     * @return \Illuminate\Http\Response
     */
    public function getNearestBusStop(Request $request, $lat, $lng) {
        $bus_stop_raw = DB::table('bus_stops')
                                ->selectRaw('id, 3956 * 2 * ASIN(SQRT( POWER(SIN((? - abs(lat)) * pi()/180 / 2),2) + COS(? * pi()/180 ) * COS(abs (lat) *  pi()/180) * POWER(SIN((? - lng) *  pi()/180 / 2), 2) )) as distance', [$lat, $lat, $lng])
                                ->orderBy('distance', 'asc')
                                ->first();
        $bus_stop = BusStop::find($bus_stop_raw->id);
        $buses_info = [];
        foreach ($bus_stop->buses()->orderBy('name', 'asc')->orderBy('pivot_waiting_time', 'asc')->get() as $bus) {
            if ($bus->pivot->waiting_time) {
                $buses_info[$bus->name][] = $bus->pivot->waiting_time;
            }
        }
        //var_dump($buses_info);
        return view('busstop', ['title' => 'Nearest Bus Stop', 'bus_stop_name' => $bus_stop->name, 'buses_info' => $buses_info ]);
    }
}
