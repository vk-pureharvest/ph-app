
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

    function dynamicdropdown(listindex)
    {
        switch (listindex)
        {
        case "100 - Product Quality" :
            document.getElementById("status").options[0]=new Option("Select Category #2","");
            document.getElementById("status").options[1]=new Option("110 - Size","110 - Size");
            document.getElementById("status").options[2]=new Option("120 - Color","120 - Color");
            document.getElementById("status").options[3]=new Option("130 - Shape","130 - Shape");
            document.getElementById("status").options[4]=new Option("140 - Taste","140 - Taste");
            document.getElementById("status").options[5]=new Option("150 - Hardness","150 - Hardness");
            document.getElementById("status").options[6]=new Option("160 - Defects ","160 - Defects ");
            document.getElementById("status").options[7]=new Option("170 - Smell","170 - Smell");
            document.getElementById("status").options[8]=new Option("180 - Wrong pack weight","180 - Wrong pack weight");
            break;
        case "200 - Service quality" :
            document.getElementById("status").options[0]=new Option("Select Category #2","");
            document.getElementById("status").options[1]=new Option("210 - Quantity","210 - Quantity");
            document.getElementById("status").options[2]=new Option("220 - Wrong product","220 - Wrong product");
            document.getElementById("status").options[3]=new Option("230 - Late delivery","230 - Late delivery");
            document.getElementById("status").options[4]=new Option("240 - Wrong destination","240 - Wrong destination");
            document.getElementById("status").options[5]=new Option("250 - Damage in transport","250 - Damage in transport");
            document.getElementById("status").options[6]=new Option("","");
            document.getElementById("status").options[7]=new Option("","");
            document.getElementById("status").options[8]=new Option("","");
            break;
        case "300 - Admin error" :
            document.getElementById("status").options[0]=new Option("Select Category #2","");
            document.getElementById("status").options[1]=new Option("310 - Wrong quantity","310 - Wrong quantity");
            document.getElementById("status").options[2]=new Option("320 - Wrong product","320 - Wrong product");
            document.getElementById("status").options[3]=new Option("330 - Wrong price","330 - Wrong price");
            document.getElementById("status").options[4]=new Option("","");
            document.getElementById("status").options[5]=new Option("","");
            document.getElementById("status").options[6]=new Option("","");
            document.getElementById("status").options[7]=new Option("","");
            document.getElementById("status").options[8]=new Option("","");
            break;
        }
        return true;
    }
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

  <form action="{{url('complaints')}}"  method="post" enctype="multipart/form-data">
   {{csrf_field()}}
 
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>      
        <option value="Harradh">{{"Harradh"}}</option>
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
      <option value="AL DAHRA AGRICULTURE LLC">{{"AL DAHRA AGRICULTURE LLC"}}</option>
      <option value="AL ZAYYAT TRADING LLC">{{"AL ZAYYAT TRADING LLC"}}</option>
      <option value="ANAZSINULABEEDEEN">{{"ANAZSINULABEEDEEN"}}</option>
      <option value="BARAKAT VEGETABLE AND FRUITS CO.">{{"BARAKAT VEGETABLE AND FRUITS CO."}}</option>
      <option value="BEST OF LATIN FOODSTUFF LLC">{{"BEST OF LATIN FOODSTUFF LLC"}}</option>
      <option value="BLUE NILE FRUITS AND VEGETABLES TRADING LLC">{{"BLUE NILE FRUITS AND VEGETABLES TRADING LLC"}}</option>
      <option value="CASH SALE">{{"CASH SALE"}}</option>
      <option value="EMIRATES FARM FOR LIVESTOCK AND AGRICULTURAL PRODUCTION LLC">{{"EMIRATES FARM FOR LIVESTOCK AND AGRICULTURAL PRODUCTION LLC"}}</option>
      <option value="FOODSTUFF TRADING CO LLC">{{"FOODSTUFF TRADING CO LLC"}}</option>
      <option value="FRESH FRUITS COMPANY VEGETABLES & FRUIT TRADING LLC">{{"FRESH FRUITS COMPANY VEGETABLES & FRUIT TRADING LLC"}}</option>
      <option value="FRESHONTABLE DWC-LLC">{{"FRESHONTABLE DWC-LLC"}}</option>
      <option value="FRESH LEAF FOODSTUFF TRADING LLC">{{"FRESH LEAF FOODSTUFF TRADING LLC"}}</option>
      <option value="GULF FRUITS TRADE COMPANY LLC">{{"GULF FRUITS TRADE COMPANY LLC"}}</option>
      <option value="GHAZI ALHAJERI">{{"GHAZI ALHAJERI"}}</option>
      <option value="GLOBAL FRESH FRUITS AND VEGETABLES L.L.C">{{"GLOBAL FRESH FRUITS AND VEGETABLES L.L.C"}}</option>
      <option value="JALEEL FRESH PRODUCE LLC (BRANCH)">{{"JALEEL FRESH PRODUCE LLC (BRANCH)"}}</option>
      <option value="KHALID AHMED FOUDEH GENERAL TRADING L.L.C">{{"KHALID AHMED FOUDEH GENERAL TRADING L.L.C"}}</option>
      <option value="KIBSONS INTERNATIONAL LLC">{{"KIBSONS INTERNATIONAL LLC"}}</option>
      <option value="LEVARHT GLOBAL FRUIT AND VEGETABLES TRADING LLC">{{"LEVARHT GLOBAL FRUIT AND VEGETABLES TRADING LLC"}}</option>
      <option value="LULU HYPERMARKET LLC - CPD DUBAI">{{"LULU HYPERMARKET LLC - CPD DUBAI"}}</option>
      <option value="LULU HYPERMARKET LLC - ABU DHABI">{{"LULU HYPERMARKET LLC - ABU DHABI"}}</option>
      <option value="MAEN AHMAD HAMADEH IDRIS">{{"MAEN AHMAD HAMADEH IDRIS"}}</option>
      <option value="MAJID AL FUTTAIM HYPERMARKETS LLC">{{"MAJID AL FUTTAIM HYPERMARKETS LLC"}}</option>
      <option value="N.R.T.C. DUBAI INTERNATIONAL VEGETABLES & FRUITS TRADING LLC">{{"N.R.T.C. DUBAI INTERNATIONAL VEGETABLES & FRUITS TRADING LLC"}}</option>
      <option value="ONE DAY ONE FRUIT TRADING - FZE">{{"ONE DAY ONE FRUIT TRADING - FZE"}}</option>
      <option value="SADAT FOODSTUFF TRADING LLC">{{"SADAT FOODSTUFF TRADING LLC"}}</option>
      <option value="SAMPLE TO PURE HARVEST MANAGEMENT">{{"SAMPLE TO PURE HARVEST MANAGEMENT"}}</option>
      <option value="SAMPLES TO NEW CUSTOMERS">{{"SAMPLES TO NEW CUSTOMERS"}}</option>
      <option value="SHARIFA KENAR SADQI GENERAL TRADING LLC">{{"SHARIFA KENAR SADQI GENERAL TRADING LLC"}}</option>
      <option value="SPINNEYS DUBAI LLC">{{"SPINNEYS DUBAI LLC"}}</option>
      <option value="TAMRAAT GENERAL TRADING LLC">{{"TAMRAAT GENERAL TRADING LLC"}}</option>
      <option value="TFC FRUITS TRADING LLC">{{"TFC FRUITS TRADING LLC"}}</option>
      <option value="THE NATIONAL AGRICULTURAL DEVELOPMENT">{{"THE NATIONAL AGRICULTURAL DEVELOPMENT"}}</option>
      <option value="TRANSMED OVERSEAS INCORPORATED S.A.">{{"TRANSMED OVERSEAS INCORPORATED S.A."}}</option>
      <option value="T.V. VIJAYAN">{{"T.V. VIJAYAN"}}</option>
      <option value="URBAN FOODS LLC">{{"URBAN FOODS LLC"}}</option>
      <option value="VEGBERRY MIDDLE EAST FRUITS & VEGETABLES TRADING LLC">{{"VEGBERRY MIDDLE EAST FRUITS & VEGETABLES TRADING LLC"}}</option>
      <option value="VIP SAMPLE BOX">{{"VIP SAMPLE BOX"}}</option>
 </select>
  </div>
  
  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Complaint Category #1</label>
        <select class="form-control w-25"  id="source" name="complaint_category_1" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">
        <option value="">Select Category #1</option>
        <option value="100 - Product Quality">100 - Product Quality</option>
        <option value="200 - Service quality">200 - Service quality</option>
        <option value="300 - Admin error">300 - Admin Error</option>
        </select>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label">Complaint Category #2</label>
    <!--<div class="sub_category_div" id="sub_category_div">Status:-->
        <script class="form-control w-25"  type="text/javascript" language="JavaScript">
        document.write('<select class="form-control w-25"  name="complaint_category_2" id="status"><option value="">Select Category #2</option></select>')
        </script>
    </div>
  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Additional Details</label>
    <textarea white-space="pre-wrap" type="text" class="form-control w-25" name="complaint_sub_category" placeholder="If Other enter reason" cols="100" rows="4"></textarea>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Batch code</label>
    <input type="text" name="batch_code" class="form-control w-25" placeholder="Enter batch_code"/>
  </div>
  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Product Type</label>
    <select class="form-control w-25" id="selectProduct" name="product_type" required focus>
    <option value="" disabled selected>Select Product Type</option>        
    <option value="Candy">Candy</option>
    <option value="Cocktail">Cocktail</option>
    <option value="COV">COV</option>
    <option value="Heirloom">Heirloom</option>
    <option value="Kale">Kale</option>
    <option value="Mixed Candy">Mixed Candy</option>
    <option value="Orange TOV">Orange TOV</option>
    <option value="Plum">Plum</option>
    <option value="Round">Round</option>
    <option value="Strabena">Strabena</option>
    <option value="TOV">TOV</option>
    <option value="Yellow TOV">Yellow TOV</option>
    <option value="Yoom">Yoom</option>
    <option value="Strawberry - Albion">Strawberry - Albion</option>  
    <option value="Strawberry - Aurora Karima">Strawberry - Aurora Karima</option>
    <option value="Strawberry - Bravura">Strawberry - Bravura</option>
    <option value="Strawberry - Carbillo">Strawberry - Carbillo</option>
    <option value="Strawberry - Furore">Strawberry - Furore</option>
    <option value="Strawberry - Murano">Strawberry - Murano</option>
    <option value="Strawberry - San Andreas">Strawberry - San Andreas</option>
    <option value="Sweet Pointed Chili Pepper">Sweet Pointed Chili Pepper</option>
    <option value="Red Lettuce">Red Lettuce</option>
    <option value="Green Lettuce">Green Lettuce</option>
    <option value="Baby Spinach">Baby Spinach</option>
    <option value="Rucola">Rucola</option>
    <option value="Mix Salad">Mix Salad</option>
  </select>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Product Details</label>
    <input type="text" name="product_type_2" class="form-control w-25" placeholder="Enter Product details"/>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Quality</label>
    <select class="form-control w-25" id="selectProduct" name="class" required focus>
    <option value="" disabled selected>Select Class</option>        
    <option value="Class 1">Class 1</option>
    <option value="Class 2">Class 2</option>
    <option value="Class 3">Class 3</option>
  </select>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Quantity Returned</label>
    <input type="decimal" name="quantity_returned" class="form-control w-25" placeholder="Enter KGs"/>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Financial Impact</label>
    <input type="decimal" name="fin_impact" class="form-control w-25" placeholder="Enter Amount"/>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Select Image for Upload</label>
     <tr> <td width="30"><input type="file" name="image" /></td></tr>
   
     <!--  <input type="file" name="image" class="custom-file_input">
       <label class ="custom-file-label"> Choose file</lable>-->
    
  </div>
  <br />
   <div class="form-group w-25">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>

@endsection
