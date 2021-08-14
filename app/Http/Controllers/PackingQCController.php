<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\packingqc;
use Illuminate\Support\Facades\Auth;
use App\Exports\PackingQCExport;
use Excel;


class PackingQCController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packingqcs = packingqc::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('packingqc.index',compact('packingqcs'));
    }

    public function exportPackingQCExcel(){
        return Excel::download(new PackingQCExport,'PackingQC.xlsx');
    }

    
    public function exportPackingQCCSV(){
        return Excel::download(new PackingQCExport,'PackingQC.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packingqc.create');
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
            'product_type'    =>  'required',
            'total_kg'    =>  'required',
            'damage_reason'    =>  'required',
            'perc'    =>  'required',
         ]);

         foreach($request->damage_reason as $key=>$damage_reason){
            $data = new packingqc();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->product_type = $request->get('product_type');
            $data->total_kg = $request->get('total_kg');
            $data->damage_reason=$request->damage_reason[$key];
            $data->perc=$request->perc[$key];
            
            $data->save();
       }
       return redirect()->route('packingqc.create')->with('success', 'Data Added');
    }
 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $packingqcs = packingqc::find($id);
        return view('packingqc.edit', compact('packingqcs', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $packingqcs = packingqc::find($id);
        return view('packingqc.edit', compact('packingqcs', 'id'));
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
            'date_added'    =>  'required',
            'product_type'    =>  'required',
            'total_kg'    =>  'required',
            'damage_reason'    =>  'required',
            'perc'    =>  'required',
         ]);

        $packingqcs = packingqc::find($id);
        $packingqcs->site_name = $request->get('site_name');
        $packingqcs->date_added = $request->get('date_added');
        $packingqcs->product_type = $request->get('product_type');
        $packingqcs->total_kg = $request->get('total_kg');
        $packingqcs->damage_reason = $request->get('damage_reason');
        $packingqcs->perc = $request->get('perc');
        $packingqcs->save();
        return redirect()->route('packingqc.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $packingqcs = packingqc::find($id);
        $packingqcs->delete();
        return redirect()->route('packingqc.index')->with('success', 'Data Deleted');
    }
}
