<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\leafy_green_harvest;
use Illuminate\Support\Facades\Auth;
use Excel;


class LeafyGreenHarvestedController extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leafy_green_harvest = Leafy_green_harvest::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('leafy_green_harvest.index',compact('leafy_green_harvest'));
    }

    public function exportPalletExcel(){
        return Excel::download(new Leafy_green_harvestExport,'Leafy_green_harvest.xlsx');
    }

    
    public function exportPalletCSV(){
        return Excel::download(new Leafy_green_harvestExport,'Leafy_green_harvest.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leafy_green_harvest.create');
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
         
         foreach($request->no_of_gutters as $key=>$no_of_gutters){
            if ($request->no_of_gutters[$key]===null){}
            else{
            $data = new Leafy_green_harvest();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->line_num=$request->line_num[$key];
            $data->product_type=$request->product_type[$key];
            $data->no_of_gutters=$request->no_of_gutters[$key];
            $data->comments=$request->comments[$key];
            
            $data->save();}
       }
       return redirect()->route('leafy_green_harvest.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leafy_green_harvest = Leafy_green_harvest::find($id);
        return view('leafy_green_harvest.edit', compact('leafy_green_harvest', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leafy_green_harvest = Leafy_green_harvest::find($id);
        return view('leafy_green_harvest.edit', compact('leafy_green_harvest', 'id'));
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

        $leafy_green_harvest = Leafy_green_harvest::find($id);
        $leafy_green_harvest->site_name = $request->get('site_name');
        $leafy_green_harvest->date_added = $request->get('date_added');
        $leafy_green_harvest->line_num = $request->get('line_num');
        $leafy_green_harvest->product_type = $request->get('product_type');
        $leafy_green_harvest->no_of_gutters = $request->get('no_of_gutters');
        $leafy_green_harvest->comments = $request->get('comments');

        $leafy_green_harvest->save();
        return redirect()->route('leafy_green_harvest.index')->with('success', 'Data Updated');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leafy_green_harvest = Leafy_green_harvest::find($id);
        $leafy_green_harvest->delete();
        return redirect()->route('leafy_green_harvest.index')->with('success', 'Data Deleted');
    }
}
