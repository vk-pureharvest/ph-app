<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\meter_reading;

class UploadWtfileController extends Controller
{
    function create()
    {
     return view('wtfile.upload');
    }

    public function index()
    {
        $meter_reading = meter_reading::all()->sortBy('id')->reverse()->take(10)->toArray();
        return view('wtfile.index', compact('meter_reading'));
    }


    function store(Request $request)
    {
   //  $this->validate($request, [
     // 'select_file'  => 'required|image|mimes:jpg,png,gif|max:2048'
     //]);
     //get file   
     $upload = $request->file('select_file');
     $filePath = $upload->getRealPath();

    //open and read
     $file=fopen($filePath, 'r');
     $header=fgetcsv($file);
     
     $escapedHeader=[];

     //validate
     foreach ($header as $key=>$value) {
         $lheader=strtolower($value);
         $escapedItem=preg_replace('/[^a-z]/','',$lheader);
         array_push($escapedHeader,$escapedItem);
     }

     //looping through rows
     while($columns=fgetcsv($file))
     {
         if($columns[0]=="")
         {
             continue;
         }
         //trim data
         foreach($columns as $key => &$values) {
             $val=preg_replace('/\D/','',$value);
         }
         $data=array_combine($escapedHeader, $columns);
         
         //setting data type
      //   foreach($data as $key => &$values) {
       //     $value=($key=="site_name")
        //}
         
        //Table update
        $sitename=$data['sitename'];
        $datereceived=$data['datereceived'];
        $metric=$data['metric'];
        $readingtype=$data['readingtype'];
        $value=$data['value'];
        
        $authUser = auth()->user();
        $meter_readings = new meter_reading();
        $meter_readings->user_id=$authUser->id;
        $meter_readings->site_name=$sitename;
        $meter_readings->date_received=date('Y-m-d',strtotime($datereceived));
        $meter_readings->metric=$metric;
        $meter_readings->reading_type=$readingtype;
        $meter_readings->value=floatval($value);
        $meter_readings->save();
     }
     return redirect()->route('wtfile.create')->with('success', 'Data Added');
    }


}
?>
