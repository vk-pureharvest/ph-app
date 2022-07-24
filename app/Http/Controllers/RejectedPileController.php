<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rejectedpile;
use Illuminate\Support\Facades\Auth;
use App\Exports\RejectedPileExport;
use Excel;


class RejectedPileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rejectedpiles = rejectedpile::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('rejectedpiles.index',compact('rejectedpiles'));
    }

    public function exportProdExcel(){
        return Excel::download(new RejectedpileExport,'Rejectedpile.xlsx');
    }

    
    public function exportProdCSV(){
        return Excel::download(new RejectedpileExport,'Rejectedpile.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rejectedpiles.create');
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

            foreach($request->check_type as $key=>$check_type){
            $data = new rejectedpile();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->check_type=$request->check_type[$key];
            $data->product_type=$request->product_type[$key];
            $data->weight=$request->weight[$key];
            $data->comment=$request->comment[$key];
            
            $data->save();
        }
        return redirect()->route('rejectedpiles.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rejectedpiles = Rejectedpile::find($id);
        return view('rejectedpiles.edit', compact('rejectedpiles', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rejectedpiles = Rejectedpile::find($id);
        return view('rejectedpiles.edit', compact('rejectedpiles', 'id'));
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

        $rejectedpiles = rejectedpile::find($id);
        $rejectedpiles->site_name = $request->get('site_name');
        $rejectedpiles->date_added = $request->get('date_added');
        $rejectedpiles->weight = $request->get('weight');
        $rejectedpiles->check_type = $request->get('check_type');
        $rejectedpiles->product_type = $request->get('product_type');
        $rejectedpiles->comment = $request->get('comment');
        $rejectedpiles->save();
        return redirect()->route('rejectedpiles.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rejectedpiles = rejectedpile::find($id);
        $rejectedpiles->delete();
        return redirect()->route('rejectedpiles.index')->with('success', 'Data Deleted');
    }
}
    