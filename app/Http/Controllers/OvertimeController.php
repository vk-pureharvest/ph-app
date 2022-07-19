<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Overtime;
use Illuminate\Support\Facades\Auth;
use App\Exports\OvertimeExport;
use Excel;


class OvertimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $overtimes = Overtime::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('overtimes.index',compact('overtimes'));
    }

    public function exportProdExcel(){
        return Excel::download(new OvertimeExport,'Overtime.xlsx');
    }

    
    public function exportProdCSV(){
        return Excel::download(new OvertimeExport,'Overtime.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('overtimes.create');
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

            foreach($request->employee as $key=>$employee){
            $data = new Overtime();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->employee=$request->employee[$key];
            $data->ot_requested=$request->ot_requested[$key];
            $data->comment=$request->comment[$key];
            $data->reason=$request->reason[$key];
            
            $data->save();
        }
        return redirect()->route('overtimes.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $overtimes = Overtime::find($id);
        return view('overtimes.edit', compact('overtimes', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $overtimes = Overtime::find($id);
        return view('overtimes.edit', compact('overtimes', 'id'));
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

        $overtimes = Overtime::find($id);
        $overtimes->site_name = $request->get('site_name');
        $overtimes->date_added = $request->get('date_added');
        $overtimes->employee = $request->get('employee');
        $overtimes->reason = $request->get('reason');
        $overtimes->ot_granted = $request->get('ot_granted');
        $overtimes->ot_requested = $request->get('ot_requested');
        $overtimes->comment = $request->get('comment');
        $overtimes->save();
        return redirect()->route('overtimes.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $overtimes = Overtime::find($id);
        $overtimes->delete();
        return redirect()->route('overtimes.index')->with('success', 'Data Deleted');
    }
}
    