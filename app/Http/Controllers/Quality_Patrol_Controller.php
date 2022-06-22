<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quality_patrol;
use Illuminate\Support\Facades\Auth;
use Excel;

class Quality_Patrol_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quality_patrols = quality_patrol::all()->sortBy('id')->reverse()->toArray();
        return view('quality_patrols.index', compact('quality_patrols'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quality_patrols.create');
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
           'category'     =>  'required',
           'sub_category' => 'required',
           'details' => 'required'
        ]);
     
        foreach($request->images as $key=>$images){
            $data = new quality_patrol();
            $data->user_id = $authUser->id;
            $data->site_name = $request->get('site_name');
            $data->date_added = $request->get('date_added');
            $data->category = $request->get('category');
            $data->sub_category = $request->get('sub_category');
            $data->details = $request->get('details');
            

            if ($request->hasfile('images')){
                $file = $request->images[$key];
                $extension = $file->getClientOriginalExtension();
                $filename = md5(rand(1000, 10000)) . '.' . $extension;
                $request->images[$key]->move('uploads/quality_patrol/', $filename);
                $data->image = $filename;
            } else {
                $data->image='';
            }
            
            $data->save();
        }
   //dd($request->all());
       
        //print($request->get('image'));
        return redirect()->route('quality_patrols.index')->with('success', 'Data Added');
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
            'class'     =>  'required',
            'fin_impact'     =>  'required'
        ]);
        $complaint = Complaint::find($id);
        $complaint->date_received = $request->get('date_received');
        $complaint->customer_name = $request->get('customer_name');
        $complaint->complaint_category_1 = $request->get('complaint_category_1');
        $complaint->complaint_category_2 = $request->get('complaint_category_2');
        $complaint->complaint_sub_category = $request->get('complaint_sub_category');
        $complaint->product_type = $request->get('product_type');
        $complaint->class = $request->get('class');
        $complaint->fin_impact = $request->get('fin_impact');
        $complaint->batch_code = $request->get('batch_code');
        $complaint->quantity_returned = $request->get('quantity_returned');
        $complaint->product_type_2 = $request->get('product_type_2');
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
        $quality_patrols = quality_patrol::find($id);
        $quality_patrols->delete();
        return redirect()->route('quality_patrols.index')->with('success', 'Data Deleted');
    }
}
