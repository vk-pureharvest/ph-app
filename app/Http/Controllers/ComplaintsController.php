<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaint;
use Illuminate\Support\Facades\Auth;
use App\Exports\ComplaintsExport;
use Excel;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::all()->sortBy('id')->reverse()->take(10)->toArray();
        return view('complaints.index', compact('complaints'));
    }

    public function exportCompExcel(){
        return Excel::download(new ComplaintsExport,'Customer Complaints.xlsx');
    }

    
    public function exportCompCSV(){
        return Excel::download(new ComplaintsExport,'Customer Complaints.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('complaints.create');
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
           'date_received'    =>  'required',
           'customer_name'     =>  'required',
           'complaint_category_1'     =>  'required',
           'complaint_category_2'     =>  'required',
           'product_type'     =>  'required',
           'fin_impact'     =>  'required'
        ]);

        
        $complaints = new Complaint([
           'user_id'    =>  $authUser->id,
           'site_name'    =>  $request->get('site_name'),
           'date_received'    =>  $request->get('date_received'),
           'customer_name'     =>  $request->get('customer_name'),
           'complaint_category_1'     =>  $request->get('complaint_category_1'),
           'complaint_category_2'     =>  $request->get('complaint_category_2'),
           'complaint_sub_category'     =>  $request->get('complaint_sub_category'),
           'product_type'     =>  $request->get('product_type'),
           'fin_impact'     =>  $request->get('fin_impact')
        ]);
        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/complaints/', $filename);
            $complaints->image = $filename;
        } else {
            $complaints->image='';
        }
        
        $complaints->save();
        //print($request->get('image'));
        return redirect()->route('complaints.index')->with('success', 'Data Added');
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
        $complaint = Complaint::find($id);
        return view('complaints.edit', compact('complaint', 'id'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'date_received'    =>  'required',
            'customer_name'     =>  'required',
            'complaint_category_1'     =>  'required',
            'complaint_category_2'     =>  'required',
            'product_type'     =>  'required',
            'fin_impact'     =>  'required'
        ]);
        $complaint = Complaint::find($id);
        $complaint->date_received = $request->get('date_received');
        $complaint->customer_name = $request->get('customer_name');
        $complaint->complaint_category_1 = $request->get('complaint_category_1');
        $complaint->complaint_category_2 = $request->get('complaint_category_2');
        $complaint->complaint_sub_category = $request->get('complaint_sub_category');
        $complaint->product_type = $request->get('product_type');
        $complaint->fin_impact = $request->get('fin_impact');
        $complaint->save();
        return redirect()->route('complaints.index')->with('success', 'Data Updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complaint = Complaint::find($id);
        $complaint->delete();
        return redirect()->route('complaints.index')->with('success', 'Data Deleted');
    }
}
