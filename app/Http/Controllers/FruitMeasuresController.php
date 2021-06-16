<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FruitMeasure;
use Illuminate\Support\Facades\Auth;

class FruitMeasuresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('fruit_measures.create');
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
            'date_received'    =>  'required',
            'row_num'     =>  'required',
            'product_type'     =>  'required',
            'BRIX'     =>  'required',
            'color'     =>  'required',
            'weight'     =>  'required',
            'length'     =>  'required',
            'width'     =>  'required'
         ]);

         $fruit_measures = new FruitMeasure([
            'user_id'    =>  $authUser->id,
            'site_name'    =>  $request->get('site_name'),
            'date_received'     =>  $request->get('date_received'),
            'row_num'     =>  $request->get('row_num'),
            'product_type'     =>  $request->get('product_type'),
            'BRIX'     =>  $request->get('BRIX'),
            'color'     =>  $request->get('color'),
            'weight'     =>  $request->get('weight'),
            'length'     =>  $request->get('length'),
            'width'     =>  $request->get('width')
         ]);
        $fruit_measures->save();
       return redirect()->route('fruit_measures.create')->with('success', 'Data Added');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
