<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\weekly_harvest_forecast;
use Illuminate\Support\Facades\Auth;
use Excel;

class WeeklyHarvestController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weekly_harvest_forecasts = weekly_harvest_forecast::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('weekly_harvest_forecasts.index',compact('weekly_harvest_forecasts'));
    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weekly_harvest_forecasts.create');
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
            'week_num'    =>  'required'
         ]);

         foreach($request->product_type as $key=>$product_type){
            $data = new weekly_harvest_forecast();
            $data->user_id = $authUser->id;
            $data->week_num = $request->get('week_num');
            $data->year = $request->get('year');
            $data->product_type=$request->product_type[$key];
            $data->kgs_harvested=$request->kgs_harvested[$key];
            
            $data->save();
       }
       return redirect()->route('weekly_harvest_forecasts.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $weekly_harvest_forecasts = weekly_harvest_forecast::find($id);
        return view('weekly_harvest_forecasts.edit', compact('weekly_harvest_forecasts', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $weekly_harvest_forecasts = weekly_harvest_forecast::find($id);
        return view('weekly_harvest_forecasts.edit', compact('weekly_harvest_forecasts', 'id'));
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
        $authUser = auth()->user();

        $this->validate($request, [
            'week_num'     =>  'required',
            'product_type'     =>  'required',
            'kgs_harvested'     =>  'required',
         ]);

        $weekly_harvest_forecasts = weekly_harvest_forecast::find($id);
        $weekly_harvest_forecasts->user_id = $authUser->id;
        $weekly_harvest_forecasts->week_num = $request->get('week_num');
        $weekly_harvest_forecasts->year = $request->get('year');
        $weekly_harvest_forecasts->product_type = $request->get('product_type');
        $weekly_harvest_forecasts->kgs_harvested = $request->get('kgs_harvested');
        $weekly_harvest_forecasts->save();
        return redirect()->route('weekly_harvest_forecasts.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $weekly_harvest_forecasts = weekly_harvest_forecast::find($id);
        $weekly_harvest_forecasts->delete();
        return redirect()->route('weekly_harvest_forecast.index')->with('success', 'Data Deleted');
    }
}
