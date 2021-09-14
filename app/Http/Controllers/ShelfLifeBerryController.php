<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shelf_Life_Berry;
use Illuminate\Support\Facades\Auth;
use App\Exports\ShelfLifeBerryExport;
use Excel;

class ShelfLifeBerryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shelflifeberry = Shelf_life_Berry::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('shelflifeberry.index',compact('shelflifeberry'));
    }

    public function exportShelfLifeBerryExcel(){
        return Excel::download(new ShelfLifeBerryExport,'Shelf_Life_Testing.xlsx');
    }

    
    public function exportShelfLifeBerryCSV(){
        return Excel::download(new ShelfLifeBerryExport,'Shelf_Life_Testing.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('shelflifeberry.create');
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
            'testing_date'     =>  'required',
            'harvest_date'     =>  'required'
         ]);
          
         foreach($request->product_type as $key=>$product_type){
            $data = new Shelf_life_Berry();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->testing_date = $request->get('testing_date');
            $data->harvest_date = $request->get('harvest_date');
            $data->product_type=$request->product_type[$key];
            $data->days_old=$request->days_old[$key];
            $data->good=$request->good[$key];
            $data->bad=$request->bad[$key];
            $data->remarks=$request->remarks[$key];
            
            $data->save();
       }
       return redirect()->route('shelflifeberry.create')->with('success', 'Data Added');
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
        $shelflifeberry = Shelf_life_Berry::find($id);
        return view('shelflifeberry.edit', compact('shelflifeberry', 'id'));
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
            'testing_date'     =>  'required',
            'harvest_date'     =>  'required'
         ]);

        $shelflifeberry = Shelf_life_Berry::find($id);
        $shelflifeberry->site_name = $request->get('site_name');
        $shelflifeberry->testing_date = $request->get('testing_date');
        $shelflifeberry->product_type = $request->get('product_type');
        $shelflifeberry->days_old = $request->get('days_old');
        $shelflifeberry->good = $request->get('good');
        $shelflifeberry->bad = $request->get('bad');
        $shelflifeberry->remarks = $request->get('remarks');
        $shelflifeberry->save();
        return redirect()->route('shelflifeberry.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shelflifeberry = Shelf_life_Berry::find($id);
        $shelflifeberry->delete();
        return redirect()->route('shelflifeberry.index')->with('success', 'Data Deleted');
    }
  
}
