<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\truck_receipt;
use Illuminate\Support\Facades\Auth;
use Excel;

class TruckReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $truck_receipts = truck_receipt::all()->sortBy('id')->reverse()->take(50)->toArray();
        return view('truck_receipts.index',compact('truck_receipts'));
    }

    public function exportProdExcel(){
        return Excel::download(new Truck_receiptExport,'Truck_Details.xlsx');
    }

    
    public function exportProdCSV(){
        return Excel::download(new Truck_receiptExport,'Truck_Details.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('truck_receipts.create');
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

         foreach($request->vehicle_reg as $key=>$vehicle_reg){
            $data = new Truck_receipt();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->vehicle_reg=$request->vehicle_reg[$key];
            $data->truck_size=$request->truck_size[$key];
            $data->no_of_pallets=$request->no_of_pallets[$key];
            $data->supplier=$request->supplier[$key];
            $data->item=$request->item[$key];
            $data->qty_received=$request->qty_received[$key];
            $data->dn_qty=$request->dn_qty[$key];
            $data->time_entered=$request->time_entered[$key];
            $data->time_left=$request->time_left[$key];
            /*return($request->supplier[$key]);*/
            $data->save();
       }
       return redirect()->route('truck_receipts.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $truck_receipts = Truck_receipt::find($id);
        return view('truck_receipts.edit', compact('truck_receipts', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $truck_receipts = Truck_receipt::find($id);
        return view('truck_receipts.edit', compact('truck_receipts', 'id'));
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
            'date_added'     =>  'required',
         ]);

        $truck_receipts = truck_receipt::find($id);
        $truck_receipts->site_name = $request->get('site_name');
        $truck_receipts->date_added = $request->get('date_added');
        $truck_receipts->vehicle_reg = $request->get('vehicle_reg');
        $truck_receipts->truck_size = $request->get('truck_size');
        $truck_receipts->no_of_pallets = $request->get('no_of_pallets');
        $truck_receipts->supplier = $request->get('supplier');
        $truck_receipts->item = $request->get('item');
        $truck_receipts->qty_received = $request->get('qty_received');
        $truck_receipts->dn_qty = $request->get('dn_qty');
        $truck_receipts->time_entered = $request->get('time_entered');
        $truck_receipts->time_left = $request->get('time_left');
        $truck_receipts->save();
        return redirect()->route('truck_receipts.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truck_receipts = truck_receipt::find($id);
        $truck_receipts->delete();
        return redirect()->route('truck_receipts.index')->with('success', 'Data Deleted');
    }
}
