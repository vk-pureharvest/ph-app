<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use Illuminate\Support\Facades\Auth;
use App\Exports\InventoryExport;
use Excel;


class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('inventories.index',compact('inventories'));
    }

    public function exportInventoryExcel(){
        return Excel::download(new InventoryExport,'Inventory.xlsx');
    }

    
    public function exportInventoryCSV(){
        return Excel::download(new InventoryExport,'Inventory.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventories.create');
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
            $data = new Inventory();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->product_type=$request->product_type[$key];
            $data->zone=$request->zone[$key];
            $data->unit=$request->unit[$key];
            $data->value=$request->value[$key];
            $data->comment=$request->comment[$key];
            
            $data->save();
       }
       return redirect()->route('inventories.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventories = Inventory::find($id);
        return view('inventories.edit', compact('inventories', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventories = Inventory::find($id);
        return view('inventories.edit', compact('inventories', 'id'));
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

        $inventories = Inventory::find($id);
        $inventories->site_name = $request->get('site_name');
        $inventories->date_added = $request->get('date_added');
        $inventories->product_type = $request->get('product_type');
        $inventories->zone = $request->get('zone');
        $inventories->unit = $request->get('unit');
        $inventories->value = $request->get('value');
        $inventories->comment = $request->get('comment');
        $inventories->save();
        return redirect()->route('inventories.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventories = Inventory::find($id);
        $inventories->delete();
        return redirect()->route('inventories.index')->with('success', 'Data Deleted');
    }
}
