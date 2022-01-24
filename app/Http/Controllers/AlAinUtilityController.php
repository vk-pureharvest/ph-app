<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alain_utility;
use Illuminate\Support\Facades\Auth;
use App\Exports\AlAinUtilityExport;
use Excel;

class AlAinUtilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alain_utilities = AlAin_Utility::all()->sortBy('id')->reverse()->take(10)->toArray();
        return view('alain_utilities.index', compact('alain_utilities'));
    }

    public function exportAlAin_UtilityExcel(){
        return Excel::download(new AlAinUtilityExport,'Al Ain Utlities.xlsx');
    }

    
    public function exportAlAin_UtilityCSV(){
        return Excel::download(new AlAinUtilityExport,'Al Ain Utlities.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alain_utilities.create');
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
            'well_water_p1'      =>   'required',
            'well_water_p2'      =>   'required',
            'well_water_p3'      =>   'required',
            'well_water_p4'      =>   'required',
            'mixing_unit_1'      =>   'required',
            'mixing_unit_2'      =>   'required',
            'pad_wall_1'      =>   'required',
            'pad_wall_2'      =>   'required',
            'tap_water_3'      =>   'required',
            'tap_water_4'      =>   'required',
            'condensation'      =>   'required',
            'chiller'      =>   'required',
            'mixing_unit_50'      =>   'required',
            'mixing_unit_60'      =>   'required',
            'electric_meter_2'      =>   'required',
            'co2_leafy_green'      =>   'required',
            'co2_tomatoes'      =>   'required'
        ]);

        
        $alain_utilities = new AlAin_Utility([
           'user_id'    =>  $authUser->id,
           'site_name'    =>  $request->get('site_name'),
           'date_added'    =>  $request->get('date_added'),
           'well_water_p1'    =>  $request->get('well_water_p1'),
            'well_water_p2'    =>  $request->get('well_water_p2'),
            'well_water_p3'    =>  $request->get('well_water_p3'),
            'well_water_p4'    =>  $request->get('well_water_p4'),
            'mixing_unit_1'    =>  $request->get('mixing_unit_1'),
            'mixing_unit_2'    =>  $request->get('mixing_unit_2'),
            'pad_wall_1'    =>  $request->get('pad_wall_1'),
            'pad_wall_2'    =>  $request->get('pad_wall_2'),
            'tap_water_3'    =>  $request->get('tap_water_3'),
            'tap_water_4'    =>  $request->get('tap_water_4'),
            'condensation'    =>  $request->get('condensation'),
            'chiller'    =>  $request->get('chiller'),
            'mixing_unit_50'    =>  $request->get('mixing_unit_50'),
            'mixing_unit_60'    =>  $request->get('mixing_unit_60'),
            'electric_meter_2'    =>  $request->get('electric_meter_2'),
            'co2_leafy_green'    =>  $request->get('co2_leafy_green'),
            'co2_tomatoes'    =>  $request->get('co2_tomatoes')
        ]);
        $alain_utilities->save();
       // print($request->get('co2_leafy_green'));
       return redirect()->route('alain_utilities.index')->with('success', 'Data Added');
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
        $alain_utilities = AlAin_Utility::find($id);
        return view('alain_utilities.edit', compact('alain_utilities', 'id'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'site_name'      =>   'required',
           'date_added'    =>  'required',
           'well_water_p1'      =>   'required',
           'well_water_p2'      =>   'required',
           'well_water_p3'      =>   'required',
           'well_water_p4'      =>   'required',
           'mixing_unit_1'      =>   'required',
           'mixing_unit_2'      =>   'required',
           'pad_wall_1'      =>   'required',
           'pad_wall_2'      =>   'required',
           'tap_water_3'      =>   'required',
           'tap_water_4'      =>   'required',
           'condensation'      =>   'required',
           'chiller'      =>   'required',
           'mixing_unit_50'      =>   'required',
           'mixing_unit_60'      =>   'required',
           'electric_meter_2'      =>   'required',
           'co2_leafy_green'      =>   'required',
           'co2_tomatoes'      =>   'required'
        ]);

        $alain_utilities = AlAin_Utility::find($id);
        $alain_utilities->date_added = $request->get('date_added');
        $alain_utilities->well_water_p1 = $request->get('well_water_p1');
        $alain_utilities->well_water_p2 = $request->get('well_water_p2');
        $alain_utilities->well_water_p3 = $request->get('well_water_p3');
        $alain_utilities->well_water_p4 = $request->get('well_water_p4');
        $alain_utilities->mixing_unit_1 = $request->get('mixing_unit_1');
        $alain_utilities->mixing_unit_2 = $request->get('mixing_unit_2');
        $alain_utilities->pad_wall_1 = $request->get('pad_wall_1');
        $alain_utilities->pad_wall_2 = $request->get('pad_wall_2');
        $alain_utilities->tap_water_3 = $request->get('tap_water_3');
        $alain_utilities->tap_water_4 = $request->get('tap_water_4');
        $alain_utilities->condensation = $request->get('condensation');
        $alain_utilities->chiller = $request->get('chiller');
        $alain_utilities->mixing_unit_50 = $request->get('mixing_unit_50');
        $alain_utilities->mixing_unit_60 = $request->get('mixing_unit_60');
        $alain_utilities->electric_meter_2 = $request->get('electric_meter_2');
        $alain_utilities->co2_leafy_green = $request->get('co2_leafy_green');
        $alain_utilities->co2_tomatoes = $request->get('co2_tomatoes');

        $alain_utilities->save();
        return redirect()->route('alain_utilities.index')->with('success', 'Data Updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alain_utilities = AlAin_Utility::find($id);
        $alain_utilities->delete();
        return redirect()->route('alain_utilities.index')->with('success', 'Data Deleted');
    }
}
