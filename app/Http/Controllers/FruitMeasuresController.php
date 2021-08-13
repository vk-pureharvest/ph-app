<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FruitMeasure;
use Illuminate\Support\Facades\Auth;
use App\Exports\FruitMeasuresExport;
use Excel;

class FruitMeasuresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fruit_measures = FruitMeasure::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('fruit_measures.index',compact('fruit_measures'));
    }

    public function exportDimExcel(){
        return Excel::download(new FruitMeasuresExport,'Dimensions.xlsx');
    }

    
    public function exportDimCSV(){
        return Excel::download(new FruitMeasuresExport,'Dimensions.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('fruit_measures.create');
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
            'date_received'    =>  'required',
            'row_num'     =>  'required'
         ]);

         foreach($request->product_type as $key=>$product_type){
            $data = new FruitMeasure();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_received = $request->get('date_received');
            $data->row_num = $request->get('row_num');
            $data->product_type=$request->product_type[$key];
            $data->BRIX=$request->BRIX[$key];
            $data->color_L=$request->color_L[$key];
            $data->color_A=$request->color_A[$key];
            $data->color_B=$request->color_B[$key];
            $data->weight=$request->weight[$key];
            $data->length=$request->length[$key];
            $data->width=$request->width[$key];
            $data->pressure=$request->pressure[$key];
            
            $data->save();
       }
       return redirect()->route('fruit_measures.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fruit_measures = FruitMeasure::find($id);
        return view('fruit_measures.edit', compact('fruit_measures', 'id'));
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
            'date_received'     =>  'required',
            'row_num'     =>  'required',
            'product_type'     =>  'required'
         ]);

        $fruit_measures = FruitMeasure::find($id);
        $fruit_measures->site_name = $request->get('site_name');
        $fruit_measures->date_received = $request->get('date_received');
        $fruit_measures->row_num = $request->get('row_num');
        $fruit_measures->product_type = $request->get('product_type');
        $fruit_measures->BRIX = $request->get('BRIX');
        $fruit_measures->color_L = $request->get('color_L');
        $fruit_measures->color_A = $request->get('color_A');
        $fruit_measures->color_B = $request->get('color_B');
        $fruit_measures->weight = $request->get('weight');
        $fruit_measures->length = $request->get('length');
        $fruit_measures->width = $request->get('width');
        $fruit_measures->pressure = $request->get('pressure');
        $fruit_measures->save();
        return redirect()->route('fruit_measures.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fruit_measures = FruitMeasure::find($id);
        $fruit_measures->delete();
        return redirect()->route('fruit_measures.index')->with('success', 'Data Deleted');
    }
}
