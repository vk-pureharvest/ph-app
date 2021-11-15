<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\harvest_schedule;
use Illuminate\Support\Facades\Auth;

class HarvestScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $harvest_schedules = harvest_schedule::all()->sortBy('id')->reverse()->take(10)->toArray();
        return view('harvest_schedules.index', compact('harvest_schedules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $harvest_schedules = harvest_schedule::find($id);
        return view('harvest_schedules.edit', compact('harvest_schedules', 'id'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'num_of_harvests'    =>  'required',
            'total_rows'     =>  'required',
            'kg_harvested'     =>  'required',
            'buffer'     =>  'required',
            'sat_harvest'     =>  'required',
            'sun_harvest'     =>  'required',
            'mon_harvest'     =>  'required',
            'tue_harvest'     =>  'required',
            'wed_harvest'     =>  'required',
            'thu_harvest'     =>  'required'
        ]);
        $harvest_schedules = harvest_schedule::find($id);
        $harvest_schedules->num_of_harvests = $request->get('num_of_harvests');
        $harvest_schedules->total_rows = $request->get('total_rows');
        $harvest_schedules->kg_harvested = $request->get('kg_harvested');
        $harvest_schedules->buffer = $request->get('buffer');
        $harvest_schedules->sat_harvest = $request->get('sat_harvest');
        $harvest_schedules->sun_harvest = $request->get('sun_harvest');
        $harvest_schedules->mon_harvest = $request->get('mon_harvest');
        $harvest_schedules->tue_harvest = $request->get('tue_harvest');
        $harvest_schedules->wed_harvest = $request->get('wed_harvest');
        $harvest_schedules->thu_harvest = $request->get('thu_harvest');
        $harvest_schedules->save();
        return redirect()->route('harvest_schedules.create')->with('success', 'Data Updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
}
