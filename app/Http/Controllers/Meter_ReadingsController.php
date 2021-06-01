<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\meter_reading;


class Meter_ReadingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meter_reading = meter_reading::all()->sortBy('id')->reverse()->take(10)->toArray();
        return view('meter_readings.index', compact('meter_reading'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meter_readings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $authUser = auth()->user();

        $this->validate($request, [
           'date_added'    =>  'required',
           'metric'     =>  'required',
           'reading_type'     =>  'required',
           'value'     =>  'required'
        ]);

        $meter_readings = new meter_reading([
           'user_id'    =>  $authUser->id,
           'date_added'    =>  $request->get('date_added'),
           'metric'     =>  $request->get('metric'),
           'reading_type'     =>  $request->get('reading_type'),
           'value'     =>  $request->get('value')
        ]);
       $meter_readings->save();
       return redirect()->route('meter_readings.index')->with('success', 'Data Added');
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
        $meter_reading = meter_reading::find($id);
        return view('meter_readings.edit', compact('meter_reading', 'id'));
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
        $this->validate($request, [
            'date_added'    =>  'required',
            'metric'     =>  'required',
            'reading_type'     =>  'required',
            'value'     =>  'required'
        ]);

        $meter_reading = meter_reading::find($id);
        $meter_reading->date_added = $request->get('date_added');
        $meter_reading->metric = $request->get('metric');
        $meter_reading->reading_type = $request->get('reading_type');
        $meter_reading->value = $request->get('value');
        $meter_reading->save();
        return redirect()->route('meter_readings.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meter_reading = meter_reading::find($id);
        $meter_reading->delete();
        return redirect()->route('meter_readings.index')->with('success', 'Data Deleted');
    }
}
