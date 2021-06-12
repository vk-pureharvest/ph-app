<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;

class IncidentsController extends Controller
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
        return view('incidents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'reported_by'    =>  'required',
            'date_received'    =>  'required',
            'title'    =>  'required',
            'type_of_incident'    =>  'required',
            'emp_name'    =>  'required',
            'emp_title'    =>  'required',
            'location'    =>  'required',
            'sp_loc'    =>  'required',
            'addn_people'    =>  'required',
            'witnesses'    =>  'required',
            'incident_desc'    =>  'required',
            'root_cause'    =>  'required',
            'action_exec'    =>  'required',
            'action_plan'    =>  'required'            
        ]);
        $incidents = new Incident([
           'reported_by'    =>  $request->get('reported_by'),
           'date_received'    =>  $request->get('date_received'),
           'title'    =>  $request->get('title'),
           'type_of_incident'    =>  $request->get('type_of_incident'),
           'emp_name'    =>  $request->get('emp_name'),
           'emp_title'    =>  $request->get('emp_title'),
           'location'    =>  $request->get('location'),
           'sp_loc'    =>  $request->get('sp_loc'),
           'addn_people'    =>  $request->get('addn_people'),
           'witnesses'    =>  $request->get('witnesses'),
           'incident_desc'    =>  $request->get(nl2br('incident_desc')),
           'root_cause'    =>  $request->get('root_cause'),
           'action_exec'    =>  $request->get('action_exec'),
           'action_plan'    =>  $request->get('action_plan')
        ]);
       // return ($request->get('incident_desc'));
       $incidents->save();
       return redirect()->route('incidents.create')->with('success', 'Data Added');
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
