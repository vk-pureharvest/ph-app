<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order_ful_ksa;
use Illuminate\Support\Facades\Auth;
use Excel;

class Order_Full_KSA_Controller extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_ful_ksas = order_ful_ksa::all()->toArray();
        return view('order_ful_ksas.index',compact('order_ful_ksas'));
    }

    public function exportLeafyShelfLifeTestExcel(){
        return Excel::download(new Order_Ful_Ksa_Export,'Order_Ful_Ksa_Testing.xlsx');
    }

    
    public function exportLeafyShelfLifeTestCSV(){
        return Excel::download(new Order_Ful_Ksa_Export,'Order_Ful_Ksa_Testing.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('order_ful_ksas.create');
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
            'site_name'      =>   'required',
           'date_added'    =>  'required',
           'product_type'     =>  'required',
           'ordered_kg'     =>  'required',
           'delivered_kg'     =>  'required',
           'forecast_kg'     =>  'required',
           'harvest_kg'     =>  'required'
        ]);

        
        foreach($request->product_type as $key=>$product_type){
            $data = new order_ful_ksa();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->product_type=$request->product_type[$key];
            $data->ordered_kg=$request->ordered_kg[$key];
            $data->delivered_kg=$request->delivered_kg[$key];
            $data->forecast_kg=$request->forecast_kg[$key];
            $data->harvest_kg=$request->harvest_kg[$key];
            $data->comment=$request->comment[$key];
            
            $data->save();
       }
       return redirect()->route('order_ful_ksas.create')->with('success', 'Data Added');
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
        $order_ful_ksas = Order_ful_ksa::find($id);
        return view('order_ful_ksas.edit', compact('order_ful_ksas', 'id'));
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
            'site_name'      =>   'required',
           'date_added'    =>  'required',
           'product_type'     =>  'required',
           'ordered_kg'     =>  'required',
           'delivered_kg'     =>  'required',
           'forecast_kg'     =>  'required',
           'harvest_kg'     =>  'required'
         ]);

        $order_ful_ksas = Order_ful_ksa::find($id);
        $order_ful_ksas->site_name = $request->get('site_name');
        $order_ful_ksas->date_added = $request->get('date_added');
        $order_ful_ksas->product_type = $request->get('product_type');
        $order_ful_ksas->ordered_kg = $request->get('ordered_kg');
        $order_ful_ksas->delivered_kg = $request->get('delivered_kg');
        $order_ful_ksas->forecast_kg = $request->get('forecast_kg');
        $order_ful_ksas->harvest_kg = $request->get('harvest_kg'); 
        $order_ful_ksas->comment = $request->get('comment');
        $order_ful_ksas->save();
        return redirect()->route('order_ful_ksas.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order_ful_ksas = Order_ful_ksa::find($id);
        $order_ful_ksas->delete();
        return redirect()->route('order_ful_ksas.index')->with('success', 'Data Deleted');
    }
  
}
