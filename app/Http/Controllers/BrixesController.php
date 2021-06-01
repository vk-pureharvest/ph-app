<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brix;
use Illuminate\Support\Facades\Auth;

class BrixesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $brixs = Brix::all()->sortBy('id')->reverse()->take(10)->toArray();
            return view('brixs.index',compact('brixs'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brixs.create');
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
            'date_received'    =>  'required',
            'product_type'     =>  'required',
            'BRIX'     =>  'required'
         ]);

        foreach($request->date_received as $key=>$date_received){
            $data = new Brix();
            $data->user_id = $authUser->id;
            $data->date_received = $date_received;
            $data->product_type=$request->product_type[$key];
            $data->BRIX=$request->BRIX[$key];
            
            $data->save();
       }
      // return($data);
       return redirect()->route('brixs.index')->with('success', 'Data Added');
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
        $brix = Brix::find($id);
        return view('brixs.edit', compact('brix', 'id'));
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
            'date_received'    =>  'required',
            'product_type'     =>  'required',
            'BRIX'     =>  'required'
        ]);
        $brix = Brix::find($id);
        $brix->date_received = $request->get('date_received');
        $brix->product_type = $request->get('product_type');
        $brix->BRIX = $request->get('BRIX');
        $brix->save();
        return redirect()->route('brixs.index')->with('success', 'Data Updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brix = Brix::find($id);
        $brix->delete();
        return redirect()->route('brixs.index')->with('success', 'Data Deleted');
    }
}
