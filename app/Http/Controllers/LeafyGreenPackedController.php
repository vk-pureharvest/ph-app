<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\leafy_green_package;
use Illuminate\Support\Facades\Auth;
use Excel;


class LeafyGreenPackedController extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leafy_green_package = Leafy_green_package::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('leafy_green_package.index',compact('leafy_green_package'));
    }

    public function exportPalletExcel(){
        return Excel::download(new Leafy_green_packageExport,'Leafy_green_package.xlsx');
    }

    
    public function exportPalletCSV(){
        return Excel::download(new Leafy_green_packageExport,'Leafy_green_package.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leafy_green_package.create');
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

            $data = new Leafy_green_package();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');            
            $data->product_type=$request->product_type[$key];
            $data->class=$request->class[$key];
            $data->item_weight=$request->item_weight[$key];
            $data->no_of_items=$request->no_of_items[$key];
            $data->package_type=$request->package_type[$key];
            
            $data->save();
       }

       return redirect()->route('leafy_green_package.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leafy_green_package = Leafy_green_package::find($id);
        return view('leafy_green_package.edit', compact('leafy_green_package', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leafy_green_package = Leafy_green_package::find($id);
        return view('leafy_green_package.edit', compact('leafy_green_package', 'id'));
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

        $leafy_green_package = Leafy_green_package::find($id);
        $leafy_green_package->site_name = $request->get('site_name');
        $leafy_green_package->date_added = $request->get('date_added');
        $leafy_green_package->product_type = $request->get('product_type');
        $leafy_green_package->class = $request->get('class');
        $leafy_green_package->item_weight = $request->get('item_weight');
        $leafy_green_package->package_type = $request->get('package_type');
        $leafy_green_package->no_of_items = $request->get('no_of_items');

        $leafy_green_package->save();
        return redirect()->route('leafy_green_package.index')->with('success', 'Data Updated');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leafy_green_package = Leafy_green_package::find($id);
        $leafy_green_package->delete();
        return redirect()->route('leafy_green_package.index')->with('success', 'Data Deleted');
    }
}
