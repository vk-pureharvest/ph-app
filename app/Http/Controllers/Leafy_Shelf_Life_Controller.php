<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\leafy_shelf_life;
use Illuminate\Support\Facades\Auth;
use App\Exports\Leafy_Shelf_Life_Export;
use Excel;

class Leafy_Shelf_Life_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leafy_shelf_lives = leafy_shelf_life::all()->toArray();
        return view('leafy_shelf_lives.index',compact('leafy_shelf_lives'));
    }

    public function exportLeafyShelfLifeTestExcel(){
        return Excel::download(new Leafy_Shelf_Life_Export,'Leafy_Shelf_Life_Testing.xlsx');
    }

    
    public function exportLeafyShelfLifeTestCSV(){
        return Excel::download(new Leafy_Shelf_Life_Export,'Leafy_Shelf_Life_Testing.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('leafy_shelf_lives.create');
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
           'smell'     =>  'required',
           'texture'     =>  'required',
           'cracks'     =>  'required',
           'wrinkles'     =>  'required',
           'color'     =>  'required',
           'spots'     =>  'required',
           'dryness'     =>  'required',
           'crunch'     =>  'required'
        ]);

        
        $leafy_shelf_lives = new Leafy_shelf_life([
           'user_id'    =>  $authUser->id,
           'site_name'    =>  $request->get('site_name'),
           'testing_date'    =>  $request->get('testing_date'),
           'product_type'     =>  $request->get('product_type'),
           'day_of_testing'     =>  $request->get('day_of_testing'),
           'date_harvested'     =>  $request->get('date_harvested'),
           'smell'     =>  $request->get('smell'),
           'texture'     =>  $request->get('texture'),
           'cracks'     =>  $request->get('cracks'),
           'wrinkles'     =>  $request->get('wrinkles'),
           'color'     =>  $request->get('color'),
           'spots'     =>  $request->get('spots'),
           'dryness'     =>  $request->get('dryness'),
           'crunch'     =>  $request->get('crunch'),
           'remarks'     =>  $request->get('remarks')
        ]);
        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/shelflifetesting/', $filename);
            $leafy_shelf_lives->image = $filename;
        } else {
            $leafy_shelf_lives->image='';
        }
            
        $leafy_shelf_lives->save();
               //print($request->get('image'));
       return redirect()->route('leafy_shelf_lives.create')->with('success', 'Data Added');
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
        $leafy_shelf_lives = Leafy_shelf_life::find($id);
        return view('leafy_shelf_lives.edit', compact('leafy_shelf_lives', 'id'));
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

        $leafy_shelf_lives = Leafy_shelf_life::find($id);
        $leafy_shelf_lives->site_name = $request->get('site_name');
        $leafy_shelf_lives->testing_date = $request->get('testing_date');
        $leafy_shelf_lives->product_type = $request->get('product_type');
        $leafy_shelf_lives->day_of_testing = $request->get('day_of_testing');
        $leafy_shelf_lives->date_harvested = $request->get('date_harvested');
        $leafy_shelf_lives->smell = $request->get('smell');
        $leafy_shelf_lives->texture = $request->get('texture');
        $leafy_shelf_lives->cracks = $request->get('cracks');
        $leafy_shelf_lives->wrinkles = $request->get('wrinkles');
        $leafy_shelf_lives->color = $request->get('color');
        $leafy_shelf_lives->spots = $request->get('spots');
        $leafy_shelf_lives->dryness = $request->get('dryness');
        $leafy_shelf_lives->crunch = $request->get('crunch');
        $leafy_shelf_lives->remarks = $request->get('remarks');
        $leafy_shelf_lives->save();
        return redirect()->route('leafy_shelf_lives.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leafy_shelf_lives = Leafy_shelf_life::find($id);
        $leafy_shelf_lives->delete();
        return redirect()->route('leafy_shelf_lives.index')->with('success', 'Data Deleted');
    }
  
}
