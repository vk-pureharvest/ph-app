<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\irrigation_data;
use Illuminate\Support\Facades\Auth;
use Excel;

class Irrigation_Data_Controller extends Controller
{
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $irrigation_datas = irrigation_data::all()->where('site_name', 'like', 'Al Ain')->sortBy('id')->reverse()->take(50)->toArray();
            return view('irrigation_datas.index',compact('irrigation_datas'));
        }
    
        public function exportProdExcel(){
            return Excel::download(new Irrigation_dataExport,'Irrigation_data.xlsx');
        }
    
        
        public function exportProdCSV(){
            return Excel::download(new Irrigation_dataExport,'Irrigation_data.csv');
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('irrigation_datas.create');
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
                 'rad_sum'     =>  'required'
             ]);
    
             foreach($request->metric as $key=>$metric){
                $data = new irrigation_data();
                $data->user_id = $authUser->id;
                $data->site_name = $request->get('site_name');
                $data->date_added = $request->get('date_added');
                $data->rad_sum = $request->get('rad_sum');
                $data->metric=$request->metric[$key]; 
                $data->v_70=$request->v_70[$key]; 
                $data->v_80=$request->v_80[$key]; 
                $data->v_90=$request->v_90[$key]; 
                $data->v_100=$request->v_100[$key]; 
                $data->v_110=$request->v_110[$key]; 
                $data->v_120=$request->v_120[$key]; 
                $data->v_130=$request->v_130[$key]; 
                $data->v_140=$request->v_140[$key]; 
                $data->v_150=$request->v_150[$key]; 
                $data->save();
           }
           return redirect()->route('irrigation_datas.create')->with('success', 'Data Added');
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $irrigation_datas = irrigation_data::find($id);
            return view('irrigation_datas.edit', compact('irrigation_datas', 'id'));
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $irrigation_datas = irrigation_data::find($id);
            return view('irrigation_datas.edit', compact('irrigation_datas', 'id'));
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
    
            $irrigation_datas = irrigation_data::find($id);
            $irrigation_datas->site_name = $request->get('site_name');
            $irrigation_datas->date_added = $request->get('date_added');
            $irrigation_datas->start_time = $request->get('start_time');
            $irrigation_datas->end_time = $request->get('end_time');
            $irrigation_datas->workstation = $request->get('workstation');
            $irrigation_datas->employee = $request->get('employee');
            $irrigation_datas->prod_boxes = $request->get('prod_boxes');
            $irrigation_datas->product_type = $request->get('product_type');
            $irrigation_datas->harvest_date = $request->get('harvest_date');
            $irrigation_datas->comment = $request->get('comment');
            $irrigation_datas->save();
            return redirect()->route('irrigation_datas.index')->with('success', 'Data Updated');
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $irrigation_datas = irrigation_data::find($id);
            $irrigation_datas->delete();
            return redirect()->route('irrigation_datas.index')->with('success', 'Data Deleted');
        }
    }
    