<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\BusStop;
use Validator;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $bus_stops = BusStop::orderBy('name', 'asc')->get();
        return view('bus', ['bus_stops' => $bus_stops, "title" => "Register New Bus"]);
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
     * Register the new bus to bus stop
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $input = [
            'name' => $request->input('name'),
            'waiting_time' => $request->input('waiting_time')
        ];
        $rules = [
            'name' => 'required|max:6',
            'waiting_time' => 'required|integer'
        ];
        $messages = [
            'name.required' => 'Bus No. is required.',
            'name.max' => 'Bus No. must not be more than :max character.'
        ];
        $validator = Validator::make($input, $rules, $messages);
        
        if ($validator->fails()) {
             return redirect('bus/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $bus_name = $request->input('name');
        $bus_stop_id = $request->input('bus_stop_id');
        $waiting_time = $request->input('waiting_time');
        $bus = Bus::where('name', $bus_name)->first();
        if (!$bus) {
            $bus = new Bus;
            $bus->name = $bus_name;
            $bus->save();
        }
        $bus->bus_stops()->attach([$bus_stop_id => ['waiting_time' => $waiting_time]]);
        return redirect('bus/create')
                    ->with('message', 'Bus is successfully registered.');
    }

}
