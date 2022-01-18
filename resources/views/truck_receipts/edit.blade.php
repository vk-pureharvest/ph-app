
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
  <form method="post" action="{{action('TruckReceiptController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$truck_receipts->site_name}}" selected="selected">{{$truck_receipts->site_name}}</option>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Date Added</label>
      <input class="form-control w-25"  type="date" name="date_added" class="form-control" id="dob" value="{{$truck_receipts->date_added}}"/>
  </div>
   
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Vehicle Registration</label>
    <input class="form-control w-25" type="text" name="vehicle_reg" class="form-control" value="{{$truck_receipts->vehicle_reg}}" placeholder="Enter Color A" />
   </div>
   
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Truck Size</label>
    <select class="form-control w-25" name="truck_size" required focus>
    <option value="{{$truck_receipts->truck_size}}" selected="selected">{{$truck_receipts->truck_size}}</option>          
        <option value="3T">3T</option>
        <option value="5T">5T</option>
   </select>   
   </div>


   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Number of Pallets</label>
    <input class="form-control w-25" type="integer" name="no_of_pallets" class="form-control" value="{{$truck_receipts->no_of_pallets}}"  />
   </div>

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Supplier Name</label>
    <select class="form-control w-25" id="selectCustomer" name="supplier" required focus>
    <option value="{{$truck_receipts->supplier}}" selected="selected">{{$truck_receipts->supplier}}</option>        
    <option value="ABU DHABI CO-OPERATIVE SOCIETY (ADCOOPS)">{{"ABU DHABI CO-OPERATIVE SOCIETY (ADCOOPS)"}}</option>
       <option value="SHARIFA KENAR SADQI GENERAL TRADING LLC">{{"SHARIFA KENAR SADQI GENERAL TRADING LLC"}}</option>
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
    <label class="col-sm-2 col-form-label">Item Received</label>
    <input class="form-control w-25" type="text" name="item" class="form-control" value="{{$truck_receipts->item}}" placeholder="Enter Color A" />
   </div>


   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Quantity Received</label>
    <input class="form-control w-25" type="decimal" name="qty_received" class="form-control" value="{{$truck_receipts->qty_received}}" placeholder="Enter Color A" />
   </div>

<div class="form-group row">
 <label class="col-sm-2 col-form-label">DN Quantity</label>
 <input class="form-control w-25" type="decimal" name="dn_qty" class="form-control" value="{{$truck_receipts->dn_qty}}" placeholder="Enter Color A" />
</div>
  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Enter Time Entered</label>
    <input class="form-control w-25" type="time" name="time_entered" class="form-control" value="{{$truck_receipts->time_entered}}" placeholder="Enter Date" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Entered Time Left</label>
    <input class="form-control w-25" type="time" name="time_left" class="form-control" value="{{$truck_receipts->time_left}}" placeholder="Enter Date" />
   </div>

   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection