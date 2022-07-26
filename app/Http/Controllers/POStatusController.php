<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\PO_request;
use App\PO_request_files;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Stroage;
use Excel; 

class POStatusController extends Controller
{
  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p_o_requests = PO_request::all()->sortBy('id')->reverse()->toArray();
        $p_o_request_files = PO_request_files::all()->sortBy('id')->reverse()->toArray();
        return view('po_status.index', compact('p_o_requests','p_o_request_files'));
    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('po_status.create');
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
            'requestor'    =>  'required',
            'supplier'     =>  'required',
            'account' => 'required',
            'request_date' => 'required',
            'amount'     =>  'required',
            'terms' => 'required', 
            'comments' => 'required'
        ]);
        
        $data = new PO_request();
        $data->user_id = $authUser->id;
        $data->requestor = $request->get('requestor');
        $data->supplier = $request->get('supplier');
        $data->account = $request->get('account');
        $data->request_date = $request->get('request_date'); 
        $data->po_number = $request->get('po_number'); 
        $data->amount = $request->get('amount');
        $data->terms = $request->get('terms');
        $data->comments = $request->get('comments');
        $data->save();

    
        foreach($request->images as $key=>$images){
            
        $img = new PO_request_files();
            if ($request->hasfile('images')){
                $file = $request->images[$key];
                $extension = $file->getClientOriginalName();
                $filename = rand(1000, 9999) . '.' . $extension;
                $request->images[$key]->move('uploads/p_o_request/', $filename);
                $img->file = $filename;
                $img->porequest_id=$data->id;
            } else {
                $img->image='';
            }
                
        $img->save();        
            }
        //print($request->get('image'));
        return redirect()->route('po_requests.create')->with('success', 'Data Added');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postatus = PO_request::find($id);
        return view('po_status.edit', compact('postatus', 'id'));
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
            'status'     =>  'required',
            'payment'     =>  'required'
         ]);

        $postatus = PO_request::find($id);
        $postatus->requestor = $request->get('requestor');
        $postatus->amount = $request->get('amount');
        $postatus->account = $request->get('account');
        $postatus->request_date = $request->get('request_date');
        $postatus->po_number = $request->get('po_number');
        $postatus->terms = $request->get('terms');
        $postatus->comments = $request->get('comments');
        $postatus->status = $request->get('status');
        $postatus->payment = $request->get('payment');
        $postatus->save();
        return redirect()->route('po_status.index')->with('success', 'Data Updated');
    }
}
    