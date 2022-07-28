<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\receivedvisual;
use Illuminate\Support\Facades\Auth;
use App\Exports\ReceivedvisualExport;
use Excel;

class ReceivedTomatoesController extends Controller
{  
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
$receivedvisuals = receivedvisual::all()->sortBy('id')->reverse()->take(50)->toArray();
return view('receivedvisuals.index',compact('receivedvisuals'));
}

public function exportProdExcel(){
return Excel::download(new ReceivedvisualExport,'Receivedvisual.xlsx');
}


public function exportProdCSV(){
return Excel::download(new ReceivedvisualExport,'Receivedvisual.csv');
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
return view('receivedvisuals.create');
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

    foreach($request->color as $key=>$color){
    $data = new receivedvisual();
    $data->user_id = $authUser->id;
    $data->site_name = $request->get('site_name');
    $data->date_added = $request->get('date_added');
    $data->product_type = $request->get('product_type');
    $data->sample=$request->sample[$key];
    $data->color=$request->color[$key];
    $data->size=$request->size[$key];
    $data->spots=$request->spots[$key];
    $data->fungus=$request->fungus[$key];
    $data->wrinkles=$request->wrinkles[$key];
    $data->softness=$request->softness[$key];
    
    $data->save();
}
return redirect()->route('receivedvisuals.create')->with('success', 'Data Added');
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
$receivedvisuals = Receivedvisual::find($id);
return view('receivedvisuals.edit', compact('receivedvisuals', 'id'));
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
$receivedvisuals = Receivedvisual::find($id);
return view('receivedvisuals.edit', compact('receivedvisuals', 'id'));
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

$receivedvisuals = receivedvisual::find($id);
$receivedvisuals->site_name = $request->get('site_name');
$receivedvisuals->date_added = $request->get('date_added');
$receivedvisuals->product_type = $request->get('product_type');
$receivedvisuals->sample = $request->get('sample');
$receivedvisuals->size = $request->get('size');
$receivedvisuals->color = $request->get('color');
$receivedvisuals->spots = $request->get('spots');
$receivedvisuals->wrinkles = $request->get('wrinkles');
$receivedvisuals->fungus = $request->get('fungus');
$receivedvisuals->softness = $request->get('softness');
$receivedvisuals->save();
return redirect()->route('receivedvisuals.index')->with('success', 'Data Updated');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
$receivedvisuals = receivedvisual::find($id);
$receivedvisuals->delete();
return redirect()->route('receivedvisuals.index')->with('success', 'Data Deleted');
}
}
