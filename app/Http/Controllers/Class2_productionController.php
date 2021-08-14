<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Class2_production;
use Illuminate\Support\Facades\Auth;
use App\Exports\Class2_productionExport;
use Excel;


class Class2_productionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Class2_productions = Class2_production::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('class2_prod.index',compact('Class2_productions'));
    }

    public function exportClass2ProdExcel(){
        return Excel::download(new Class2_productionExport,'Class2_production.xlsx');
    }

    
    public function exportClass2ProdCSV(){
        return Excel::download(new Class2_productionExport,'Class2_production.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('class2_prod.create');
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
         ]);

         foreach($request->product_type as $key=>$product_type){
            $data = new Class2_production();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->product_type=$request->product_type[$key];
            $data->class_type=$request->class_type[$key];
            $data->production=$request->production[$key];
            
            $data->save();
       }
       return redirect()->route('class2_prod.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Class2_productions = Class2_production::find($id);
        return view('class2_prod.edit', compact('Class2_productions', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Class2_productions = Class2_production::find($id);
        return view('class2_prod.edit', compact('Class2_productions', 'id'));
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

        $Class2_productions = Class2_production::find($id);
        $Class2_productions->site_name = $request->get('site_name');
        $Class2_productions->date_added = $request->get('date_added');
        $Class2_productions->product_type = $request->get('product_type');
        $Class2_productions->class_type = $request->get('class_type');
        $Class2_productions->production = $request->get('production');
        $Class2_productions->save();
        return redirect()->route('class2_prod.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Class2_productions = Class2_production::find($id);
        $Class2_productions->delete();
        return redirect()->route('class2_prod.index')->with('success', 'Data Deleted');
    }
}
