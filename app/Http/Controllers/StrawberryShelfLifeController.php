<?php

namespace App\Http\Controllers;
 

use Illuminate\Http\Request;
use App\strawberry_shelf_life; 
use Illuminate\Support\Facades\Auth; 
use Excel;

 
class StrawberryShelfLifeController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $strawberry_shelf_lives = Strawberry_shelf_life::all()->sortBy('id')->reverse()->toArray();
        return view('strawberry_shelf_lives.index',compact('strawberry_shelf_lives'));
    }

    public function exportStrawberry_shelf_lifeExcel(){
        return Excel::download(new Strawberry_shelf_lifeExport,'Shelf_Life_Testing.xlsx');
    }

    
    public function exportStrawberry_shelf_lifeCSV(){
        return Excel::download(new Strawberry_shelf_lifeExport,'Shelf_Life_Testing.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('strawberry_shelf_lives.create');
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
           'color_A'     =>  'required',
           'color_B'     =>  'required',
           'color_L'     =>  'required',
           'color_rank'     =>  'required',
           'BRIX'     =>  'required',
           'firmness'     =>  'required',
           'firmness_rank'     =>  'required',
           'class'     =>  'required',
           'weight'     =>  'required',
           'height'     =>  'required',
           'width'     =>  'required'
        ]);

        
        $strawberry_shelf_lives = new Strawberry_shelf_life([
           'user_id'    =>  $authUser->id,
           'site_name'    =>  $request->get('site_name'),
           'testing_date'    =>  $request->get('testing_date'),
           'product_type'     =>  $request->get('product_type'),
           'day_of_testing'     =>  $request->get('day_of_testing'),
           'date_harvested'     =>  $request->get('date_harvested'),
           'color_L'     =>  $request->get('color_L'),
           'color_A'     =>  $request->get('color_A'),
           'color_B'     =>  $request->get('color_B'),
           'color_rank'     =>  $request->get('color_rank'),
           'BRIX'     =>  $request->get('BRIX'),
           'firmness'     =>  $request->get('firmness'),
           'firmness_rank'     =>  $request->get('firmness_rank'), 
           'weight'     =>  $request->get('weight'),
           'height'     =>  $request->get('height'),
           'width'     =>  $request->get('width'),
           'class'     =>  $request->get('class'), 
           'remarks'     =>  $request->get('remarks')
        ]); 
            
        $strawberry_shelf_lives->save();
               //print($request->get('image'));
       return redirect()->route('strawberry_shelf_lives.create')->with('success', 'Data Added');
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
        $strawberry_shelf_lives = Strawberry_shelf_life::find($id);
        return view('strawberry_shelf_lives.edit', compact('strawberry_shelf_lives', 'id'));
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
            'date_harvested'     =>  'required'
         ]);

        $strawberry_shelf_lives = Strawberry_shelf_life::find($id);
        $strawberry_shelf_lives->site_name = $request->get('site_name');
        $strawberry_shelf_lives->testing_date = $request->get('testing_date');
        $strawberry_shelf_lives->product_type = $request->get('product_type');
        $strawberry_shelf_lives->day_of_testing = $request->get('day_of_testing');
        $strawberry_shelf_lives->date_harvested = $request->get('date_harvested');
        $strawberry_shelf_lives->color_L = $request->get('color_L');
        $strawberry_shelf_lives->color_A = $request->get('color_A');
        $strawberry_shelf_lives->color_B = $request->get('color_B');
        $strawberry_shelf_lives->color_rank = $request->get('color_rank');
        $strawberry_shelf_lives->BRIX = $request->get('BRIX');
        $strawberry_shelf_lives->firmness = $request->get('firmness');
        $strawberry_shelf_lives->firmness_rank = $request->get('firmness_rank');
        $strawberry_shelf_lives->class = $request->get('class');
        $strawberry_shelf_lives->weight = $request->get('weight');
        $strawberry_shelf_lives->width = $request->get('width');
        $strawberry_shelf_lives->height = $request->get('height'); 
        $strawberry_shelf_lives->remarks = $request->get('remarks');
        $strawberry_shelf_lives->save();
        return redirect()->route('strawberry_shelf_lives.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $strawberry_shelf_lives = Strawberry_shelf_life::find($id);
        $strawberry_shelf_lives->delete();
        return redirect()->route('strawberry_shelf_lives.index')->with('success', 'Data Deleted');
    }
  
}
