<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\truck_temp;
use Illuminate\Support\Facades\Auth;
use Excel;

class TruckTempController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $truck_temps = truck_temp::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('truck_temps.index',compact('truck_temps'));
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('truck_temps.create');
    }

    public function store(Request $request)
    {

        $authUser = auth()->user();
        
        $this->validate($request, [
            'site_name'    =>  'required',
            'date_added'    =>  'required'
         ]);

         foreach($request->truck_num as $key=>$truck_num){
            $data = new Truck_temp();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->truck_num=$request->truck_num[$key];
            $data->truck_temp=$request->truck_temp[$key];
            $data->driver_name=$request->driver_name[$key];
            $data->product_name=$request->product_name[$key];
            $data->truck_clean=$request->truck_clean[$key];
            $data->comments=$request->comments[$key];
            $data->save();
       }
       return redirect()->route('truck_temps.create')->with('success', 'Data Added');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $truck_temps = truck_temp::find($id);
        return view('truck_temps.edit', compact('truck_temps', 'id'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $truck_temps = truck_temp::find($id);
        return view('truck_temps.edit', compact('truck_temps', 'id'));
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
            'site_name'    =>  'required',
            'date_added'    =>  'required'
         ]);
         
        $truck_temps = truck_temp::find($id);
        $truck_temps->site_name = $request->get('site_name');
        $truck_temps->date_added = $request->get('date_added');
        $truck_temps->truck_num = $request->get('truck_num');
        $truck_temps->truck_temp = $request->get('truck_temp');
        $truck_temps->driver_name = $request->get('driver_name');
        $truck_temps->product_name = $request->get('product_name');
        $truck_temps->truck_clean = $request->get('truck_clean');
        $truck_temps->comments = $request->get('comments');
        $truck_temps->save();

        return redirect()->route('truck_temps.index')->with('success', 'Data Updated');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truck_temps = truck_temp::find($id);
        $truck_temps->delete();
        return redirect()->route('truck_temps.index')->with('success', 'Data Deleted');
    }
}
