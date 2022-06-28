<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\fertilizer_tom;
use Illuminate\Support\Facades\Auth;
use Excel;


class Fertilizer_Tom_Controller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fertilizer_toms = fertilizer_tom::all()->where('site_name', 'like', 'Al Ain')->sortBy('id')->reverse()->take(50)->toArray();
        return view('fertilizer_toms.index',compact('fertilizer_toms'));
    }

    public function exportProdExcel(){
        return Excel::download(new Fertilizer_tomExport,'Fertilizer_tom.xlsx');
    }

    
    public function exportProdCSV(){
        return Excel::download(new Fertilizer_tomExport,'Fertilizer_tom.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fertilizer_toms.create');
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
            'metric'     =>  'required'
            ]);

            foreach($request->metric as $key=>$metric){
            $data = new fertilizer_tom();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->metric=$request->metric[$key]; 
            $data->drip=$request->drip[$key];   
            $data->drain=$request->drain[$key];   
            $data->save();
        }
        return redirect()->route('fertilizer_toms.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fertilizer_toms = fertilizer_tom::find($id);
        return view('fertilizer_toms.edit', compact('fertilizer_toms', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fertilizer_toms = fertilizer_tom::find($id);
        return view('fertilizer_toms.edit', compact('fertilizer_toms', 'id'));
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
            'start_time'     =>  'required',
            'end_time'     =>  'required',
            'workstation'     =>  'required',
            ]);

        $fertilizer_toms = fertilizer_tom::find($id);
        $fertilizer_toms->site_name = $request->get('site_name');
        $fertilizer_toms->date_added = $request->get('date_added');
        $fertilizer_toms->start_time = $request->get('start_time');
        $fertilizer_toms->end_time = $request->get('end_time');
        $fertilizer_toms->workstation = $request->get('workstation');
        $fertilizer_toms->employee = $request->get('employee');
        $fertilizer_toms->prod_boxes = $request->get('prod_boxes');
        $fertilizer_toms->product_type = $request->get('product_type');
        $fertilizer_toms->harvest_date = $request->get('harvest_date');
        $fertilizer_toms->comment = $request->get('comment');
        $fertilizer_toms->save();
        return redirect()->route('fertilizer_toms.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fertilizer_toms = fertilizer_tom::find($id);
        $fertilizer_toms->delete();
        return redirect()->route('fertilizer_toms.index')->with('success', 'Data Deleted');
    }
}
