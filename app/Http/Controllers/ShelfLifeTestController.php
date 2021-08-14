<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShelfLifeTest;
use Illuminate\Support\Facades\Auth;
use App\Exports\ShelfLifeTestExport;
use Excel;

class ShelfLifeTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shelflifetests = ShelfLifeTest::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('shelflifetests.index',compact('shelflifetests'));
    }

    public function exportShelfLifeTestExcel(){
        return Excel::download(new ShelfLifeTestExport,'Shelf_Life_Testing.xlsx');
    }

    
    public function exportShelfLifeTestCSV(){
        return Excel::download(new ShelfLifeTestExport,'Shelf_Life_Testing.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('shelflifetests.create');
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
            $data = new ShelfLifeTest();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->testing_date = $request->get('testing_date');
            $data->harvest_date = $request->get('harvest_date');
            $data->product_type=$request->product_type[$key];
            $data->BRIX=$request->BRIX[$key];
            $data->color_L=$request->color_L[$key];
            $data->color_A=$request->color_A[$key];
            $data->color_B=$request->color_B[$key];
            $data->weight=$request->weight[$key];
            $data->length=$request->length[$key];
            $data->width=$request->width[$key];
            $data->pressure=$request->pressure[$key];
            $data->remarks=$request->remarks[$key];
            
            $data->save();
       }
       return redirect()->route('shelflifetests.create')->with('success', 'Data Added');
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
        $shelflifetests = ShelfLifeTest::find($id);
        return view('shelflifetests.edit', compact('shelflifetests', 'id'));
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

        $shelflifetests = ShelfLifeTest::find($id);
        $shelflifetests->site_name = $request->get('site_name');
        $shelflifetests->testing_date = $request->get('testing_date');
        $shelflifetests->product_type = $request->get('product_type');
        $shelflifetests->BRIX = $request->get('BRIX');
        $shelflifetests->color_L = $request->get('color_L');
        $shelflifetests->color_A = $request->get('color_A');
        $shelflifetests->color_B = $request->get('color_B');
        $shelflifetests->weight = $request->get('weight');
        $shelflifetests->length = $request->get('length');
        $shelflifetests->width = $request->get('width');
        $shelflifetests->pressure = $request->get('pressure');
        $shelflifetests->remarks = $request->get('remarks');
        $shelflifetests->save();
        return redirect()->route('shelflifetests.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shelflifetests = ShelfLifeTest::find($id);
        $shelflifetests->delete();
        return redirect()->route('shelflifetests.index')->with('success', 'Data Deleted');
    }
  
}
