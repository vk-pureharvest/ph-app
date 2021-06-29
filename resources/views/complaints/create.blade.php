
@extends('layouts.app')


@section('header')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel1') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
    
</head>
<style>
div {
  padding-right: 30px;
  padding-left: 40px;
}
</style>
@endsection

@section('content')

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


<div class="row">
 <div class="col-md-12">
  @if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif
  <br />
  <div><H4 >  Add Customer Complaint </H4></div>
  <br />
  <div align="middle">
   <a href="{{route('complaints.index')}}" class="btn btn-primary">View Complaints Data</a>
   <br />
   <br />
  </div>

  <form method="post" action="{{url('complaints')}}">
   {{csrf_field()}}
 
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Complaint Date</label>
    <input class="form-control w-25" type="date" name="date_received" class="form-control" id="dob"  placeholder="Enter Complaint Date"/>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Customer Name</label>
    <select class="form-control w-25" id="selectCustomer" name="customer_name" required focus>
       <option value="" disabled selected>Select Customer</option>   
       <option value="ABU DHABI CO-OPERATIVE SOCIETY (ADCOOPS)">{{"ABU DHABI CO-OPERATIVE SOCIETY (ADCOOPS)"}}</option>
      <option value="ANAZSINULABEEDEEN">{{"ANAZSINULABEEDEEN"}}</option>
      <option value="BARAKAT VEGETABLE AND FRUITS CO.">{{"BARAKAT VEGETABLE AND FRUITS CO."}}</option>
      <option value="FRESHONTABLE DWC-LLC">{{"FRESHONTABLE DWC-LLC"}}</option>
      <option value="GHAZI ALHAJERI">{{"GHAZI ALHAJERI"}}</option>
      <option value="GLOBAL FRESH FRUITS AND VEGETABLES L.L.C">{{"GLOBAL FRESH FRUITS AND VEGETABLES L.L.C"}}</option>
      <option value="JALEEL FRESH PRODUCE LLC (BRANCH)">{{"JALEEL FRESH PRODUCE LLC (BRANCH)"}}</option>
      <option value="KIBSONS INTERNATIONAL LLC">{{"KIBSONS INTERNATIONAL LLC"}}</option>
      <option value="LEVARHT GLOBAL FRUIT AND VEGETABLES TRADING LLC">{{"LEVARHT GLOBAL FRUIT AND VEGETABLES TRADING LLC"}}</option>
      <option value="MAEN AHMAD HAMADEH IDRIS">{{"MAEN AHMAD HAMADEH IDRIS"}}</option>
      <option value="MAJID AL FUTTAIM HYPERMARKETS LLC">{{"MAJID AL FUTTAIM HYPERMARKETS LLC"}}</option>
      <option value="SAMPLE TO PURE HARVEST MANAGEMENT">{{"SAMPLE TO PURE HARVEST MANAGEMENT"}}</option>
      <option value="SAMPLES TO NEW CUSTOMERS">{{"SAMPLES TO NEW CUSTOMERS"}}</option>
      <option value="SPINNEYS DUBAI LLC">{{"SPINNEYS DUBAI LLC"}}</option>
      <option value="T.V. VIJAYAN">{{"T.V. VIJAYAN"}}</option>
      <option value="TRANSMED OVERSEAS INCORPORATED S.A.">{{"TRANSMED OVERSEAS INCORPORATED S.A."}}</option>
      <option value="VEGBERRY MIDDLE EAST FRUITS & VEGETABLES TRADING LLC">{{"VEGBERRY MIDDLE EAST FRUITS & VEGETABLES TRADING LLC"}}</option>
      <option value="VIP SAMPLE BOX">{{"VIP SAMPLE BOX"}}</option>
 </select>
  </div>
  
  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Complaint Category</label>
    <select class="form-control w-25" id="selectCategory" name="complaint_category" required focus>
    <option value="" disabled selected>Select Complaint Category</option>        
    <option value="Quality">{{"Quality"}}</option>
    <option value="Quantity">{{"Quantity"}}</option>
    <option value="Delivery">{{"Delivery"}}</option>    
    <option value="Other">{{"Other"}}</option>
  </select>
  </div>

  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Additional Details</label>
    <textarea white-space="pre-wrap" type="text" class="form-control w-25" name="complaint_sub_category" value="If Other enter reason" cols="100" rows="4">If Other enter reason</textarea>
  </div>
  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Product Type</label>
    <select class="form-control w-25" id="selectProduct" name="product_type" required focus>
    <option value="" disabled selected>Select Product Type</option>        
    <option value="Candy">Candy</option>
    <option value="Cocktail">Cocktail</option>
    <option value="COV">COV</option>
    <option value="Heirloom">Heirloom</option>
    <option value="Mixed Candy">Mixed Candy</option>
    <option value="Orange TOV">Orange TOV</option>
    <option value="Plum">Plum</option>
    <option value="Round">Round</option>
    <option value="Strabena">Strabena</option>
    <option value="TOV">TOV</option>
    <option value="Yellow TOV">Yellow TOV</option>
    <option value="Yoom">Yoom</option>
  </select>
  </div>
  <br />
   <div class="form-group w-25">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>

@endsection
