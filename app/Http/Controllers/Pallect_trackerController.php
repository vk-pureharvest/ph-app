<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pallet_tracker;
use Illuminate\Support\Facades\Auth;
use App\Exports\Pallet_trackerExport;
use Excel;


class Pallect_trackerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pallet_tracker = Pallet_tracker::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('pallet_tracker.index',compact('pallet_tracker'));
    }

    public function exportPalletExcel(){
        return Excel::download(new Pallet_trackerExport,'Pallet_tracker.xlsx');
    }

    
    public function exportPalletCSV(){
        return Excel::download(new Pallet_trackerExport,'Pallet_tracker.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pallet_tracker.create');
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
            'date_added'    =>  'required',
            'time_added'     =>  'required'
         ]);
         
         foreach($request->quality_check as $key=>$quality_check){
            $data = new Pallet_tracker();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->time_added=$request->time_added[$key];
            $data->quality_check=$request->quality_check[$key];
            $data->weight_check=$request->weight_check[$key];
            $data->weight_entered=$request->weight_entered[$key];
            $data->material_check=$request->material_check[$key];
            $data->quality_controller=$request->quality_controller[$key];
            $data->shift_leader=$request->shift_leader[$key];
            $data->remarks=$request->remarks[$key];
            
            $data->save();
       }
       return redirect()->route('pallet_tracker.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pallet_tracker = Pallet_tracker::find($id);
        return view('pallet_tracker.edit', compact('pallet_tracker', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pallet_tracker = Pallet_tracker::find($id);
        return view('pallet_tracker.edit', compact('pallet_tracker', 'id'));
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
            'time_added'     =>  'required',
         ]);

        $pallet_tracker = Pallet_tracker::find($id);
        $pallet_tracker->site_name = $request->get('site_name');
        $pallet_tracker->date_added = $request->get('date_added');
        $pallet_tracker->time_added = $request->get('time_added');
        $pallet_tracker->quality_check = $request->get('quality_check');
        $pallet_tracker->weight_check = $request->get('weight_check');
        $pallet_tracker->weight_entered = $request->get('weight_entered');
        $pallet_tracker->material_check = $request->get('material_check');
        $pallet_tracker->quality_controller = $request->get('quality_controller');
        $pallet_tracker->shift_leader = $request->get('shift_leader');
        $pallet_tracker->remarks = $request->get('remarks');

        $pallet_tracker->save();
        return redirect()->route('pallet_tracker.index')->with('success', 'Data Updated');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pallet_tracker = Pallet_tracker::find($id);
        $pallet_tracker->delete();
        return redirect()->route('pallet_tracker.index')->with('success', 'Data Deleted');
    }
}
