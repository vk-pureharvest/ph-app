<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\leafy_closing_stock;
use Illuminate\Support\Facades\Auth;
use Excel;

class Leafy_Closing_Stock_Controller extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leafy_closing_stock = Leafy_closing_stock::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('leafy_closing_stock.index',compact('leafy_closing_stock'));
    }

    public function exportPalletExcel(){
        return Excel::download(new Leafy_closing_stockExport,'Leafy_closing_stock.xlsx');
    }

    
    public function exportPalletCSV(){
        return Excel::download(new Leafy_closing_stockExport,'Leafy_closing_stock.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leafy_closing_stock.create');
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
         
         foreach($request->product_type as $key=>$product_type){
            $data = new Leafy_closing_stock();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->product_type=$request->product_type[$key];
            $data->total_kgs=$request->total_kgs[$key];
            $data->comments=$request->comments[$key];
            
            $data->save();
       }
       return redirect()->route('leafy_closing_stock.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leafy_closing_stock = Leafy_closing_stock::find($id);
        return view('leafy_closing_stock.edit', compact('leafy_closing_stock', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leafy_closing_stock = Leafy_closing_stock::find($id);
        return view('leafy_closing_stock.edit', compact('leafy_closing_stock', 'id'));
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

        $leafy_closing_stock = Leafy_closing_stock::find($id);
        $leafy_closing_stock->site_name = $request->get('site_name');
        $leafy_closing_stock->date_added = $request->get('date_added');
        $leafy_closing_stock->product_type = $request->get('product_type');
        $leafy_closing_stock->total_kgs = $request->get('total_kgs');
        $leafy_closing_stock->comments = $request->get('comments');

        $leafy_closing_stock->save();
        return redirect()->route('leafy_closing_stock.index')->with('success', 'Data Updated');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leafy_closing_stock = Leafy_closing_stock::find($id);
        $leafy_closing_stock->delete();
        return redirect()->route('leafy_closing_stock.index')->with('success', 'Data Deleted');
    }
}
