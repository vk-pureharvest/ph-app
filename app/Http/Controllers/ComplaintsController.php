<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaint;

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
        if($request->has('complaint_sub_category')) {
            $subcategory = $request->get('complaint_sub_category');
        } else {
            $subcategory = null;
        }


        $this->validate($request, [
            'site_name'      =>   'required',
           'date_received'    =>  'required',
           'customer_name'     =>  'required',
           'complaint_category'     =>  'required',
           'product_type'     =>  'required'
        ]);
        $complaints = new Complaint([
           'user_id'    =>  $authUser->id,
           'site_name'    =>  $request->get('site_name'),
           'date_received'    =>  $request->get('date_received'),
           'customer_name'     =>  $request->get('customer_name'),
           'complaint_category'     =>  $request->get('complaint_category'),
           'complaint_sub_category'     =>  $subcategory,
           'product_type'     =>  $request->get('product_type')
        ]);
       $complaints->save();
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
            'complaint_category'     =>  'required',
            'complaint_sub_category'     =>  'required',
            'product_type'     =>  'required'
        ]);
        $complaint = Complaint::find($id);
        $complaint->date_received = $request->get('date_received');
        $complaint->customer_name = $request->get('customer_name');
        $complaint->complaint_category = $request->get('complaint_category');
        $complaint->complaint_sub_category = $request->get('complaint_sub_category');
        $complaint->product_type = $request->get('product_type');
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
