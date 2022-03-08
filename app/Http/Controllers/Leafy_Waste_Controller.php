<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\leafy_waste;
use Illuminate\Support\Facades\Auth;
use Excel;

class Leafy_Waste_Controller extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leafy_waste = Leafy_waste::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('leafy_waste.index',compact('leafy_waste'));
    }

    public function exportPalletExcel(){
        return Excel::download(new Leafy_wasteExport,'Leafy_waste.xlsx');
    }

    
    public function exportPalletCSV(){
        return Excel::download(new Leafy_wasteExport,'Leafy_waste.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leafy_waste.create');
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
         
         foreach($request->product_type as $key=>$product_type){
            $data = new Leafy_waste();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->product_type=$request->product_type[$key];
            $data->total_kgs=$request->total_kgs[$key];
            $data->comments=$request->comments[$key];
            
            $data->save();
       }
       return redirect()->route('leafy_waste.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leafy_waste = Leafy_waste::find($id);
        return view('leafy_waste.edit', compact('leafy_waste', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leafy_waste = Leafy_waste::find($id);
        return view('leafy_waste.edit', compact('leafy_waste', 'id'));
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

        $leafy_waste = Leafy_waste::find($id);
        $leafy_waste->site_name = $request->get('site_name');
        $leafy_waste->date_added = $request->get('date_added');
        $leafy_waste->product_type = $request->get('product_type');
        $leafy_waste->total_kgs = $request->get('total_kgs');
        $leafy_waste->comments = $request->get('comments');

        $leafy_waste->save();
        return redirect()->route('leafy_waste.index')->with('success', 'Data Updated');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leafy_waste = Leafy_waste::find($id);
        $leafy_waste->delete();
        return redirect()->route('leafy_waste.index')->with('success', 'Data Deleted');
    }
}
