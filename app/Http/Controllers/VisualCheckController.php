<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\visualcheck;
use Illuminate\Support\Facades\Auth;
use App\Exports\VisualcheckExport;
use Excel;



class VisualCheckController extends Controller
{

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    $visualchecks = visualcheck::all()->sortBy('id')->reverse()->take(50)->toArray();
    return view('visualchecks.index',compact('visualchecks'));
}

public function exportProdExcel(){
    return Excel::download(new VisualcheckExport,'Visualcheck.xlsx');
}


public function exportProdCSV(){
    return Excel::download(new VisualcheckExport,'Visualcheck.csv');
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    return view('visualchecks.create');
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

        foreach($request->quality as $key=>$quality){
        $data = new visualcheck();
        $data->user_id = $authUser->id;
        $data->site_name = $request->get('site_name');
        $data->date_added = $request->get('date_added');
        $data->product_type = $request->get('product_type');
        $data->sticker=$request->sticker[$key];
        $data->sample=$request->sample[$key];
        $data->quality=$request->quality[$key];
        $data->order_variety=$request->order_variety[$key];
        $data->appearance=$request->appearance[$key];
        $data->batch=$request->batch[$key];
        $data->weight=$request->weight[$key];
        $data->packaging=$request->packaging[$key];
        
        $data->save();
    }
    return redirect()->route('visualchecks.create')->with('success', 'Data Added');
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    $visualchecks = Visualcheck::find($id);
    return view('visualchecks.edit', compact('visualchecks', 'id'));
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $visualchecks = Visualcheck::find($id);
    return view('visualchecks.edit', compact('visualchecks', 'id'));
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

    $visualchecks = visualcheck::find($id);
    $visualchecks->site_name = $request->get('site_name');
    $visualchecks->date_added = $request->get('date_added');
    $visualchecks->product_type = $request->get('product_type');
    $visualchecks->sample = $request->get('sample');
    $visualchecks->quality = $request->get('quality');
    $visualchecks->order_variety = $request->get('order_variety');
    $visualchecks->appearance = $request->get('appearance');
    $visualchecks->batch = $request->get('batch');
    $visualchecks->sticker = $request->get('sticker');
    $visualchecks->weight = $request->get('weight');
    $visualchecks->packaging = $request->get('packaging');
    $visualchecks->save();
    return redirect()->route('visualchecks.index')->with('success', 'Data Updated');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $visualchecks = visualcheck::find($id);
    $visualchecks->delete();
    return redirect()->route('visualchecks.index')->with('success', 'Data Deleted');
}
}
