<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nahel_Utility;
use Illuminate\Support\Facades\Auth;
use App\Exports\NahelUtilityExport;
use Excel;

class NahelUtilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nahel_utilities = Nahel_Utility::all()->sortBy('id')->reverse()->take(10)->toArray();
        return view('nahel_utilities.index', compact('nahel_utilities'));
    }

    public function exportNahel_UtilityExcel(){
        return Excel::download(new NahelUtilityExport,'Nahel Utlities.xlsx');
    }

    
    public function exportNahel_UtilityCSV(){
        return Excel::download(new NahelUtilityExport,'Nahel Utlities.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nahel_utilities.create');
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
           'date_added'    =>  'required',
           'electra_1'     =>  'required',
           'electra_2'     =>  'required',
           'reject_water'     =>  'required',
           'supply_water_1'     =>  'required',
           'supply_water_2'     =>  'required',
           'irrigation_water'     =>  'required',
           'ground_water'     =>  'required',
           'ec_padwall_water' => 'required'
        ]);

        
        $nahel_utilities = new Nahel_Utility([
           'user_id'    =>  $authUser->id,
           'site_name'    =>  $request->get('site_name'),
           'date_added'    =>  $request->get('date_added'),
           'electra_1'     =>  $request->get('electra_1'),
           'electra_2'     =>  $request->get('electra_2'),
           'reject_water'     =>  $request->get('reject_water'),
           'supply_water_1'     =>  $request->get('supply_water_1'),
           'supply_water_2'     =>  $request->get('supply_water_2'),
           'irrigation_water'     =>  $request->get('irrigation_water'),
           'ground_water'     =>  $request->get('ground_water'),
           'ec_padwall_water'     =>  $request->get('ec_padwall_water')
        ]);
        $nahel_utilities->save();
        //print($request->get('image'));
        return redirect()->route('nahel_utilities.index')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $nahel_utilities = Nahel_Utility::find($id);
        return view('nahel_utilities.edit', compact('nahel_utilities', 'id'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'site_name'      =>   'required',
           'date_added'    =>  'required',
           'electra_1'     =>  'required',
           'electra_2'     =>  'required',
           'reject_water'     =>  'required',
           'supply_water_1'     =>  'required',
           'supply_water_2'     =>  'required',
           'irrigation_water'     =>  'required',
           'ground_water'     =>  'required',
           'ec_padwall_water' => 'required'
        ]);

        $nahel_utilities = Nahel_Utility::find($id);
        $nahel_utilities->date_added = $request->get('date_added');
        $nahel_utilities->electra_1 = $request->get('electra_1');
        $nahel_utilities->electra_2 = $request->get('electra_2');
        $nahel_utilities->reject_water = $request->get('reject_water');
        $nahel_utilities->supply_water_1 = $request->get('supply_water_1');
        $nahel_utilities->supply_water_2 = $request->get('supply_water_2');
        $nahel_utilities->irrigation_water = $request->get('irrigation_water');
        $nahel_utilities->ground_water = $request->get('ground_water');
        $nahel_utilities->ec_padwall_water = $request->get('ec_padwall_water');
        $nahel_utilities->save();
        return redirect()->route('nahel_utilities.index')->with('success', 'Data Updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nahel_utilities = Nahel_Utility::find($id);
        $nahel_utilities->delete();
        return redirect()->route('nahel_utilities.index')->with('success', 'Data Deleted');
    }
}
