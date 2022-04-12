<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Production;
use Illuminate\Support\Facades\Auth;
use App\Exports\ProductionExport;
use Excel;


class ProductionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productions = Production::all()->where('site_name', 'not like', 'KSA')->sortBy('id')->reverse()->take(50)->toArray();
        return view('productions.index',compact('productions'));
    }

    public function exportProdExcel(){
        return Excel::download(new ProductionExport,'Production.xlsx');
    }

    
    public function exportProdCSV(){
        return Excel::download(new ProductionExport,'Production.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productions.create');
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
            'start_time'     =>  'required',
            'end_time'     =>  'required'
         ]);

         foreach($request->product_type as $key=>$product_type){
            $data = new Production();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->start_time = $request->get('start_time');
            $data->end_time = $request->get('end_time');
            $data->workstation=$request->workstation[$key];
            $data->employee=$request->employee[$key];
            $data->prod_boxes=$request->prod_boxes[$key];
            $data->product_type=$request->product_type[$key];
            $data->harvest_date=$request->harvest_date[$key];
            $data->comment=$request->comment[$key];
            
            $data->save();
       }
       return redirect()->route('productions.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productions = Production::find($id);
        return view('productions.edit', compact('productions', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productions = Production::find($id);
        return view('productions.edit', compact('productions', 'id'));
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

        $productions = Production::find($id);
        $productions->site_name = $request->get('site_name');
        $productions->date_added = $request->get('date_added');
        $productions->start_time = $request->get('start_time');
        $productions->end_time = $request->get('end_time');
        $productions->workstation = $request->get('workstation');
        $productions->employee = $request->get('employee');
        $productions->prod_boxes = $request->get('prod_boxes');
        $productions->product_type = $request->get('product_type');
        $productions->harvest_date = $request->get('harvest_date');
        $productions->comment = $request->get('comment');
        $productions->save();
        return redirect()->route('productions.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productions = Production::find($id);
        $productions->delete();
        return redirect()->route('productions.index')->with('success', 'Data Deleted');
    }
}
