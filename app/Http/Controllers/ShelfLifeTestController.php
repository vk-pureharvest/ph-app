<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShelfLifeTest;
use App\Shelf_life_Berry;
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
        $shelflifetests = ShelfLifeTest::all()->toArray();
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
            'site_name'      =>   'required',
           'testing_date'    =>  'required',
           'day_of_testing'     =>  'required',
           'date_harvested'     =>  'required',
           'product_type'     =>  'required',
           'color'     =>  'required',
           'color_rank'     =>  'required',
           'BRIX'     =>  'required',
           'firmness'     =>  'required',
           'firmness_rank'     =>  'required',
           'smell_rank'     =>  'required',
           'weight'     =>  'required',
           'height'     =>  'required',
           'width'     =>  'required',
           'weight_rank'     =>  'required',
           'vine_quality'     =>  'required',
           'spots'     =>  'required',
           'fungus'     =>  'required',
           'quality_rank'     =>  'required'
        ]);

        
        $shelflifetests = new ShelfLifeTest([
           'user_id'    =>  $authUser->id,
           'site_name'    =>  $request->get('site_name'),
           'testing_date'    =>  $request->get('testing_date'),
           'product_type'     =>  $request->get('product_type'),
           'day_of_testing'     =>  $request->get('day_of_testing'),
           'date_harvested'     =>  $request->get('date_harvested'),
           'color'     =>  $request->get('color'),
           'color_rank'     =>  $request->get('color_rank'),
           'BRIX'     =>  $request->get('BRIX'),
           'firmness'     =>  $request->get('firmness'),
           'firmness_rank'     =>  $request->get('firmness_rank'),
           'smell_rank'     =>  $request->get('smell_rank'),
           'weight'     =>  $request->get('weight'),
           'height'     =>  $request->get('height'),
           'width'     =>  $request->get('width'),
           'weight_rank'     =>  $request->get('weight_rank'),
           'vine_quality'     =>  $request->get('vine_quality'),
           'spots'     =>  $request->get('spots'),
           'fungus'     =>  $request->get('fungus'),
           'quality_rank'     =>  $request->get('quality_rank'),
           'remarks'     =>  $request->get('remarks')
        ]);
        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/shelflifetesting/', $filename);
            $shelflifetests->image = $filename;
        } else {
            $shelflifetests->image='';
        }
            
        $shelflifetests->save();
               //print($request->get('image'));
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
        $shelflifetests->height = $request->get('height');
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
