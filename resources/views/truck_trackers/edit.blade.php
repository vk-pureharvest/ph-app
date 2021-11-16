
@extends('layouts.app')

@section('header')

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true
        });
    } );
    </script>

<style>
div {
  padding-right: 30px;
  padding-left: 30px;
}
</style>

@endsection

@section('content')


<div class="row">
 <div class="col-md-12">
  <br />
  <h3>Edit Truck Details data</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('TruckController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$truck_trackers->site_name}}" selected="selected">{{$truck_trackers->site_name}}</option>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Date Added</label>
      <input class="form-control w-25"  type="date" name="date_added" class="form-control" id="dob" value="{{$truck_trackers->date_added}}"/>
  </div>
   
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Vehicle Registration</label>
    <input class="form-control w-25" type="text" name="vehicle_reg" class="form-control" value="{{$truck_trackers->vehicle_reg}}" placeholder="Enter Color A" />
   </div>

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Truck Number</label>
    <input class="form-control w-25" type="text" name="truck_num" class="form-control" value="{{$truck_trackers->truck_num}}" placeholder="Enter Color A" />
   </div>

   
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Truck Size</label>
    <select class="form-control w-25" name="truck_size" required focus>
    <option value="{{$truck_trackers->truck_size}}" selected="selected">{{$truck_trackers->truck_size}}</option>          
        <option value="3T">3T</option>
        <option value="5T">5T</option>
   </select>   
   </div>


   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Number of Pallets</label>
    <input class="form-control w-25" type="integer" name="no_of_pallets" class="form-control" value="{{$truck_trackers->no_of_pallets}}"  />
   </div>

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Customer Name</label>
    <select class="form-control w-25" id="selectCustomer" name="customer" required focus>
    <option value="{{$truck_trackers->customer}}" selected="selected">{{$truck_trackers->customer}}</option>        
    <option value="ABU DHABI CO-OPERATIVE SOCIETY (ADCOOPS)">{{"ABU DHABI CO-OPERATIVE SOCIETY (ADCOOPS)"}}</option>
      <option value="AL DAHRA AGRICULTURE LLC">{{"AL DAHRA AGRICULTURE LLC"}}</option>
      <option value="ANAZSINULABEEDEEN">{{"ANAZSINULABEEDEEN"}}</option>
      <option value="BEST OF LATIN FOODSTUFF">{{"BEST OF LATIN FOODSTUFF"}}</option>
      <option value="BARAKAT VEGETABLE AND FRUITS CO.">{{"BARAKAT VEGETABLE AND FRUITS CO."}}</option>
      <option value="CASH SALE">{{"CASH SALE"}}</option>
      <option value="EMIRATES FARM FOR LIVESTOCK AND AGRICULTURAL PRODUCTION LLC">{{"EMIRATES FARM FOR LIVESTOCK AND AGRICULTURAL PRODUCTION LLC"}}</option>
      <option value="FRESH FRUITS COMPANY VEGETABLES & FRUIT TRADING LLC">{{"FRESH FRUITS COMPANY VEGETABLES & FRUIT TRADING LLC"}}</option>
      <option value="FRESHONTABLE DWC-LLC">{{"FRESHONTABLE DWC-LLC"}}</option>
      <option value="GHAZI ALHAJERI">{{"GHAZI ALHAJERI"}}</option>
      <option value="GLOBAL FRESH FRUITS AND VEGETABLES L.L.C">{{"GLOBAL FRESH FRUITS AND VEGETABLES L.L.C"}}</option>
      <option value="JALEEL FRESH PRODUCE LLC (BRANCH)">{{"JALEEL FRESH PRODUCE LLC (BRANCH)"}}</option>
      <option value="KIBSONS INTERNATIONAL LLC">{{"KIBSONS INTERNATIONAL LLC"}}</option>
      <option value="LEVARHT GLOBAL FRUIT AND VEGETABLES TRADING LLC">{{"LEVARHT GLOBAL FRUIT AND VEGETABLES TRADING LLC"}}</option>
      <option value="LULU HYPERMARKET LLC - CPD DUBAI">{{"LULU HYPERMARKET LLC - CPD DUBAI"}}</option>
      <option value="LULU HYPERMARKET LLC - ABU DHABI">{{"LULU HYPERMARKET LLC - ABU DHABI"}}</option>
      <option value="MAEN AHMAD HAMADEH IDRIS">{{"MAEN AHMAD HAMADEH IDRIS"}}</option>
      <option value="MAJID AL FUTTAIM HYPERMARKETS LLC">{{"MAJID AL FUTTAIM HYPERMARKETS LLC"}}</option>
      <option value="N.R.T.C. DUBAI INTERNATIONAL VEGETABLES & FRUITS TRADING LLC">{{"N.R.T.C. DUBAI INTERNATIONAL VEGETABLES & FRUITS TRADING LLC"}}</option>
      <option value="SAMPLE TO PURE HARVEST MANAGEMENT">{{"SAMPLE TO PURE HARVEST MANAGEMENT"}}</option>
      <option value="SAMPLES TO NEW CUSTOMERS">{{"SAMPLES TO NEW CUSTOMERS"}}</option>
      <option value="SPINNEYS DUBAI LLC">{{"SPINNEYS DUBAI LLC"}}</option>
      <option value="TAMRAAT GENERAL TRADING LLC">{{"TAMRAAT GENERAL TRADING LLC"}}</option>
      <option value="TFC FRUITS TRADING LLC">{{"TFC FRUITS TRADING LLC"}}</option>
      <option value="TRANSMED OVERSEAS INCORPORATED S.A.">{{"TRANSMED OVERSEAS INCORPORATED S.A."}}</option>
      <option value="T.V. VIJAYAN">{{"T.V. VIJAYAN"}}</option>
      <option value="VEGBERRY MIDDLE EAST FRUITS & VEGETABLES TRADING LLC">{{"VEGBERRY MIDDLE EAST FRUITS & VEGETABLES TRADING LLC"}}</option>
      <option value="VIP SAMPLE BOX">{{"VIP SAMPLE BOX"}}</option>
      <option value="Other">{{"Other"}}</option>
   </select>   
   </div>
   
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Location</label>
    <select class="form-control w-25" name="location" required focus>
    <option value="{{$truck_trackers->location}}" selected="selected">{{$truck_trackers->location}}</option>            
        <option value="Abu Dhabi">Abu Dhabi</option>
        <option value="Dubai">Dubai</option>
        <option value="Sharjah">Sharjah</option>
   </select>   
   </div>

  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Enter Time Entered</label>
    <input class="form-control w-25" type="time" name="time_entered" class="form-control" value="{{$truck_trackers->time_entered}}" placeholder="Enter Date" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Entered Time Left</label>
    <input class="form-control w-25" type="time" name="time_left" class="form-control" value="{{$truck_trackers->time_left}}" placeholder="Enter Date" />
   </div>

   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection