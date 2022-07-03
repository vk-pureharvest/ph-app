<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\substrate_data;
use Illuminate\Support\Facades\Auth;
use Excel;

class Substrate_Data_Controller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $substrate_datas = substrate_data::all()->where('site_name', 'like', 'Al Ain')->sortBy('id')->reverse()->take(50)->toArray();
        return view('substrate_datas.index',compact('substrate_datas'));
    }

    public function exportProdExcel(){
        return Excel::download(new Substrate_dataExport,'Substrate_data.xlsx');
    }

    
    public function exportProdCSV(){
        return Excel::download(new Substrate_dataExport,'Substrate_data.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('substrate_datas.create');
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
            'compartment'     =>  'required'
            ]);

            foreach($request->metric as $key=>$metric){
            $data = new substrate_data();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->compartment = $request->get('compartment');
            $data->metric=$request->metric[$key]; 
            $data->pl_1=$request->pl_1[$key];   
            $data->pl_2=$request->pl_2[$key];   
            $data->pl_3=$request->pl_3[$key];   
            $data->save();
        }
        return redirect()->route('substrate_datas.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $substrate_datas = substrate_data::find($id);
        return view('substrate_datas.edit', compact('substrate_datas', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $substrate_datas = substrate_data::find($id);
        return view('substrate_datas.edit', compact('substrate_datas', 'id'));
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

        $substrate_datas = substrate_data::find($id);
        $substrate_datas->site_name = $request->get('site_name');
        $substrate_datas->date_added = $request->get('date_added');
        $substrate_datas->compartment = $request->get('compartment');
        $substrate_datas->metric = $request->get('metric');
        $substrate_datas->pl_1 = $request->get('pl_1');
        $substrate_datas->pl_2 = $request->get('pl_2');
        $substrate_datas->pl_3 = $request->get('pl_3');
        $substrate_datas->save();
        return redirect()->route('substrate_datas.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $substrate_datas = substrate_data::find($id);
        $substrate_datas->delete();
        return redirect()->route('substrate_datas.index')->with('success', 'Data Deleted');
    }
}
