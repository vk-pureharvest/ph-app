
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
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- new additions -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" type="text/css" /> 
    
    
     <!-- new additions -->

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
  <br />
  <h3 aling="center">Add Complaint</h3>
  <br />
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
  <div align="middle">
   <a href="{{route('complaints.index')}}" class="btn btn-primary">View Complaints Data</a>
   <br />
   <br />
  </div>

  <form method="post" action="{{url('complaints')}}">
   {{csrf_field()}}
 
   <div class="form-group w-25">
   <select class="form-control" id="selectCategory" name="site_name" required focus>
    <option value="Al Ain" selected>Al Ain</option>        
    <option value="Nahel">{{"Nahel"}}</option>
  </select>
  </div>
    <div class="form-group w-25">
    <input type="date" name="date_received" class="form-control" id="dob"  placeholder="Enter Complaint Date"/>
   </div>

   <div class="form-group w-25">  
       <select class="form-control" id="selectCustomer" name="customer_name" required focus>
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

   <div class="form-group w-25">  
       <select class="form-control" id="selectCategory" name="complaint_category" required focus>
    <option value="" disabled selected>Select Complaint Category</option>        
    <option value="Quality">{{"Quality"}}</option>
    <option value="Quantity">{{"Quantity"}}</option>
    <option value="Delivery">{{"Delivery"}}</option>    
    <option value="Other">{{"Other"}}</option>
  </select>
  </div>
   <div class="form-group w-25">
    <textarea white-space="pre-wrap" type="text" class="form-control" name="complaint_sub_category" value="If Other enter reason" cols="100" rows="4">If Other enter reason</textarea>
   </div>
   
   <div class="form-group w-25">  
       <select class="form-control" id="selectProduct" name="product_type" required focus>
    <option value="" disabled selected>Select Product Type</option>        
    <option value="Candy">Candy</option>
    <option value="Cocktail">Cocktail</option>
    <option value="Candy/Swetela">Candy/Swetela</option>
    <option value="Cocktail Brioso">Cocktail Brioso</option>
    <option value="Cocktail/Campri">Cocktail/Campri</option>
    <option value="COV">COV</option>
    <option value="Intense Plum">Intense Plum</option>
    <option value="Intense Plum Line 09">Intense Plum Line 09</option>
    <option value="Intense Plum Line 10">Intense Plum Line 10</option>
    <option value="Pink Fujemaru">Pink Fujemaru</option>
    <option value="Pink kavakutchi">Pink kavakutchi</option>
    <option value="Pink Rose">Pink Rose</option>
    <option value="Strabena">Strabena</option>
    <option value="TOV">TOV</option>
    <option value="Yoom">Yoom</option>
  </select>
  </div>

   <div class="form-group w-25">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>

@endsection
