<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dimension;
use Illuminate\Support\Facades\Auth;

class DimensionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dimensions = dimension::all()->sortBy('id')->reverse()->take(10)->toArray();
        return view('dimensions.index',compact('dimensions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dimensions.create');
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
           'date_added'    =>  'required',
           'product_type'     =>  'required',
           'length'     =>  'required',
           'width'     =>  'required',
           'weight'     =>  'required'
        ]);

        $dimensions = new dimension([
           'user_id'    =>  $authUser->id,
           'date_added'    =>  $request->get('date_added'),
           'product_type'     =>  $request->get('product_type'),
           'length'     =>  $request->get('length'),
           'width'     =>  $request->get('width'),
           'weight'     =>  $request->get('weight')
        ]);
       $dimensions->save();
       return redirect()->route('dimensions.index')->with('success', 'Data Added');
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
        $dimensions = dimension::find($id);
        return view('dimensions.edit', compact('dimensions', 'id'));
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
            'date_added'    =>  'required',
            'product_type'     =>  'required',
            'length'     =>  'required',
            'width'     =>  'required',
            'weight'     =>  'required'
         ]);

        $dimensions = dimension::find($id);
        $dimensions->date_added = $request->get('date_added');
        $dimensions->product_type = $request->get('product_type');
        $dimensions->length = $request->get('length');
        $dimensions->width = $request->get('width');
        $dimensions->weight = $request->get('weight');
        $dimensions->save();
        return redirect()->route('dimensions.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dimensions = dimension::find($id);
        $dimensions->delete();
        return redirect()->route('dimensions.index')->with('success', 'Data Deleted');
    }
}
