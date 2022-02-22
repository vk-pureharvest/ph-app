<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\truck_tracker;
use Illuminate\Support\Facades\Auth;
use Excel;


class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $truck_trackers = truck_tracker::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('truck_trackers.index',compact('truck_trackers'));
    }

    public function exportProdExcel(){
        return Excel::download(new Truck_trackerExport,'Truck_Details.xlsx');
    }

    
    public function exportProdCSV(){
        return Excel::download(new Truck_trackerExport,'Truck_Details.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('truck_trackers.create');
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
            'site_name'    =>  'required',
            'date_added'    =>  'required'
         ]);

         foreach($request->truck_num as $key=>$truck_num){
            $data = new Truck_tracker();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->truck_num=$request->truck_num[$key];
            $data->no_of_pallets=$request->no_of_pallets[$key];
            $data->customer=$request->customer[$key];
            $data->kgs_loaded=$request->kgs_loaded[$key];
            
            $data->save();
       }
       return redirect()->route('truck_trackers.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $truck_trackers = Truck_tracker::find($id);
        return view('truck_trackers.edit', compact('truck_trackers', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $truck_trackers = Truck_tracker::find($id);
        return view('truck_trackers.edit', compact('truck_trackers', 'id'));
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
            'date_added'     =>  'required',
         ]);

        $truck_trackers = truck_tracker::find($id);
        $truck_trackers->site_name = $request->get('site_name');
        $truck_trackers->date_added = $request->get('date_added');
        $truck_trackers->truck_num = $request->get('truck_num');
        $truck_trackers->no_of_pallets = $request->get('no_of_pallets');
        $truck_trackers->customer = $request->get('customer');
        $truck_trackers->kgs_loaded = $request->get('kgs_loaded');
        $truck_trackers->save();
        return redirect()->route('truck_trackers.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truck_trackers = truck_tracker::find($id);
        $truck_trackers->delete();
        return redirect()->route('truck_trackers.index')->with('success', 'Data Deleted');
    }
}
