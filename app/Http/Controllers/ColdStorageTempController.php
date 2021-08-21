<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cold_storage_temp;
use Illuminate\Support\Facades\Auth;
use App\Exports\ColdStorageTempExport;
use Excel;


class ColdStorageTempController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cold_storage_temps = cold_storage_temp::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('cold_storage_temps.index',compact('cold_storage_temps'));
    }

    public function exportProdExcel(){
        return Excel::download(new ColdStorageTempExport,'Cold_Storage_Temperature.xlsx');
    }

    
    public function exportProdCSV(){
        return Excel::download(new ColdStorageTempExport,'Cold_Storage_Temperature.csv');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cold_storage_temps.create');
    }

    public function store(Request $request)
    {
        $authUser = auth()->user();
        
        $this->validate($request, [
            'site_name'    =>  'required',
            'date_added'    =>  'required'
         ]);
         
         foreach($request->time_recorded as $key=>$time_recorded){
            $data = new cold_storage_temp();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->quality_controller = $request->get('quality_controller');
            $data->shift_leader = $request->get('shift_leader');
            $data->remarks = $request->get('remarks');
            $data->time_recorded=$request->time_recorded[$key];
            $data->temp_recorded=$request->temp_recorded[$key];
            
            $data->save();
       }
       return redirect()->route('cold_storage_temps.create')->with('success', 'Data Added');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cold_storage_temps = cold_storage_temp::find($id);
        return view('cold_storage_temps.edit', compact('cold_storage_temps', 'id'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cold_storage_temps = cold_storage_temp::find($id);
        return view('cold_storage_temps.edit', compact('cold_storage_temps', 'id'));
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
            'date_added'    =>  'required',
            'time_recorded'     =>  'required',
            'temp_recorded'     =>  'required',
         ]);
         
        $cold_storage_temps = cold_storage_temp::find($id);
        $cold_storage_temps->site_name = $request->get('site_name');
        $cold_storage_temps->date_added = $request->get('date_added');
        $cold_storage_temps->time_recorded = $request->get('time_recorded');
        $cold_storage_temps->temp_recorded = $request->get('temp_recorded');
        $cold_storage_temps->quality_controller = $request->get('quality_controller');
        $cold_storage_temps->shift_leader = $request->get('shift_leader');
        $cold_storage_temps->remarks = $request->get('remarks');
        $cold_storage_temps->save();
        return redirect()->route('cold_storage_temps.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cold_storage_temps = cold_storage_temp::find($id);
        $cold_storage_temps->delete();
        return redirect()->route('cold_storage_temps.index')->with('success', 'Data Deleted');
    }
}
