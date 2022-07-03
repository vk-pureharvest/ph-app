<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\plant_data;
use Illuminate\Support\Facades\Auth;
use Excel;

class Plant_Data_Controller extends Controller
{
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $plant_datas = plant_data::all()->where('site_name', 'like', 'Al Ain')->sortBy('id')->reverse()->take(50)->toArray();
            return view('plant_datas.index',compact('plant_datas'));
        }
    
        public function exportProdExcel(){
            return Excel::download(new Plant_dataExport,'Plant_data.xlsx');
        }
    
        
        public function exportProdCSV(){
            return Excel::download(new Plant_dataExport,'Plant_data.csv');
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('plant_datas.create');
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
                 'product_type'     =>  'required'
             ]);
    
             foreach($request->metric as $key=>$metric){
                $data = new plant_data();
                $data->user_id = $authUser->id;
                $data->site_name = $request->get('site_name');
                $data->date_added = $request->get('date_added');
                $data->product_type = $request->get('product_type');
                $data->metric=$request->metric[$key]; 
                $data->pl_1=$request->pl_1[$key];   
                $data->pl_2=$request->pl_2[$key];   
                $data->pl_3=$request->pl_3[$key];   
                $data->pl_4=$request->pl_4[$key];   
                $data->pl_5=$request->pl_5[$key];  
                $data->save();
           }
           return redirect()->route('plant_datas.create')->with('success', 'Data Added');
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $plant_datas = plant_data::find($id);
            return view('plant_datas.edit', compact('plant_datas', 'id'));
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $plant_datas = plant_data::find($id);
            return view('plant_datas.edit', compact('plant_datas', 'id'));
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
    
            $plant_datas = plant_data::find($id);
            $plant_datas->site_name = $request->get('site_name');
            $plant_datas->date_added = $request->get('date_added');
            $plant_datas->product_type = $request->get('product_type');
            $plant_datas->metric = $request->get('metric');
            $plant_datas->pl_1 = $request->get('pl_1');
            $plant_datas->pl_2 = $request->get('pl_2');
            $plant_datas->pl_3 = $request->get('pl_3');
            $plant_datas->pl_4 = $request->get('pl_4');
            $plant_datas->pl_5 = $request->get('pl_5');
            $plant_datas->save();
            return redirect()->route('plant_datas.index')->with('success', 'Data Updated');
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $plant_datas = plant_data::find($id);
            $plant_datas->delete();
            return redirect()->route('plant_datas.index')->with('success', 'Data Deleted');
        }
    }
    