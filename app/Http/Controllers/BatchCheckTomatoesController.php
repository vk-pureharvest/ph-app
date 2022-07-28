<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\batchvisual;
use Illuminate\Support\Facades\Auth;
use App\Exports\BatchvisualExport;
use Excel;

class BatchCheckTomatoesController extends Controller
{

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    $batchvisuals = batchvisual::all()->sortBy('id')->reverse()->take(50)->toArray();
    return view('batchvisuals.index',compact('batchvisuals'));
}

public function exportProdExcel(){
    return Excel::download(new BatchvisualExport,'Batchvisual.xlsx');
}


public function exportProdCSV(){
    return Excel::download(new BatchvisualExport,'Batchvisual.csv');
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    return view('batchvisuals.create');
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

        foreach($request->batch_code as $key=>$batch_code){
        $data = new batchvisual();
        $data->user_id = $authUser->id;
        $data->site_name = $request->get('site_name');
        $data->date_added = $request->get('date_added');
        $data->product_type = $request->get('product_type');
        $data->sample=$request->sample[$key];
        $data->batch_code=$request->batch_code[$key];
        $data->expiry_date=$request->expiry_date[$key];
        
        $data->save();
    }
    return redirect()->route('batchvisuals.create')->with('success', 'Data Added');
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    $batchvisuals = Batchvisual::find($id);
    return view('batchvisuals.edit', compact('batchvisuals', 'id'));
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $batchvisuals = Batchvisual::find($id);
    return view('batchvisuals.edit', compact('batchvisuals', 'id'));
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

    $batchvisuals = batchvisual::find($id);
    $batchvisuals->site_name = $request->get('site_name');
    $batchvisuals->date_added = $request->get('date_added');
    $batchvisuals->product_type = $request->get('product_type');
    $batchvisuals->sample = $request->get('sample');
    $batchvisuals->batch_code = $request->get('batch_code');
    $batchvisuals->expiry_date = $request->get('expiry_date');
    $batchvisuals->save();
    return redirect()->route('batchvisuals.index')->with('success', 'Data Updated');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $batchvisuals = batchvisual::find($id);
    $batchvisuals->delete();
    return redirect()->route('batchvisuals.index')->with('success', 'Data Deleted');
}
}
    