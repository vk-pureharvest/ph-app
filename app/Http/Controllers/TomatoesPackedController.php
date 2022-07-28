<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\packedvisual;
use Illuminate\Support\Facades\Auth;
use App\Exports\PackedvisualExport;
use Excel;

class TomatoesPackedController extends Controller
{

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    $packedvisuals = packedvisual::all()->sortBy('id')->reverse()->take(50)->toArray();
    return view('packedvisuals.index',compact('packedvisuals'));
}

public function exportProdExcel(){
    return Excel::download(new PackedvisualExport,'Packedvisual.xlsx');
}


public function exportProdCSV(){
    return Excel::download(new PackedvisualExport,'Packedvisual.csv');
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    return view('packedvisuals.create');
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

        foreach($request->weight as $key=>$weight){
        $data = new packedvisual();
        $data->user_id = $authUser->id;
        $data->site_name = $request->get('site_name');
        $data->date_added = $request->get('date_added');
        $data->product_type = $request->get('product_type');
        $data->sample=$request->sample[$key];
        $data->weight=$request->weight[$key];
        $data->quality=$request->quality[$key];
        $data->specs=$request->specs[$key];
        
        $data->save();
    }
    return redirect()->route('packedvisuals.create')->with('success', 'Data Added');
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    $packedvisuals = Packedvisual::find($id);
    return view('packedvisuals.edit', compact('packedvisuals', 'id'));
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $packedvisuals = Packedvisual::find($id);
    return view('packedvisuals.edit', compact('packedvisuals', 'id'));
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
        'date_added'     =>  'required'
        ]);

    $packedvisuals = packedvisual::find($id);
    $packedvisuals->site_name = $request->get('site_name');
    $packedvisuals->date_added = $request->get('date_added');
    $packedvisuals->product_type = $request->get('product_type');
    $packedvisuals->sample = $request->get('sample');
    $packedvisuals->weight = $request->get('weight');
    $packedvisuals->quality = $request->get('quality');
    $packedvisuals->specs = $request->get('specs');
    $packedvisuals->save();
    return redirect()->route('packedvisuals.index')->with('success', 'Data Updated');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $packedvisuals = packedvisual::find($id);
    $packedvisuals->delete();
    return redirect()->route('packedvisuals.index')->with('success', 'Data Deleted');
}
}
    