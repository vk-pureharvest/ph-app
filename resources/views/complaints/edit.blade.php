
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
        case "400 - Customer Error" :
            document.getElementById("status").options[0]=new Option("Select Category #2","");
            document.getElementById("status").options[1]=new Option("410 - Wrong order","310 - Wrong order");
            document.getElementById("status").options[2]=new Option("420 - Excess Stock","420 - Excess Stock");
            document.getElementById("status").options[3]=new Option("430 - Not required","430 - Not required"); 
            break;      
        }
        return true;
    }
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
  <h3>Edit Complaint</h3>
 <br />
  
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('ComplaintsController@update', $id)}}">
   {{csrf_field()}}
   

   <input type="hidden" name="_method" value="PATCH" />
   
  

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
    <select class="form-control w-25" id="site" name="site_name" required focus>
    <option value="{{$complaint->site_name}}" selected="selected">{{$complaint->site_name}}</option>   
    <option value="Al Ain">{{"Al Ain"}}</option>   
    <option value="Nahel">{{"Nahel"}}</option>
    <option value="Harradh">{{"Harradh"}}</option>
  </select>
  </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Date Added</label>
    <input class="form-control w-25" type="date" name="date_received" class="form-control" id="dob" value="{{$complaint->date_received}}" placeholder="Enter Date" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Customer Name</label>
    <select class="form-control w-25" id="selectCustomer" name="customer_name" required focus>
    <option value="{{$complaint->customer_name}}" selected="selected">{{$complaint->customer_name}}</option>        
    <option value="ABU DHABI CO-OPERATIVE SOCIETY (ADCOOPS)">{{"ABU DHABI CO-OPERATIVE SOCIETY (ADCOOPS)"}}</option>
      <option value="AL DAHRA AGRICULTURE LLC">{{"AL DAHRA AGRICULTURE LLC"}}</option>
      <option value="AL ZAYYAT TRADING LLC">{{"AL ZAYYAT TRADING LLC"}}</option>
      <option value="ANAZSINULABEEDEEN">{{"ANAZSINULABEEDEEN"}}</option>
      <option value="BARAKAT VEGETABLE AND FRUITS CO.">{{"BARAKAT VEGETABLE AND FRUITS CO."}}</option>
      <option value="BLUE NILE FRUITS AND VEGETABLES TRADING LLC">{{"BLUE NILE FRUITS AND VEGETABLES TRADING LLC"}}</option>
      <option value="CASH SALE">{{"CASH SALE"}}</option>
      <option value="EMIRATES FARM FOR LIVESTOCK AND AGRICULTURAL PRODUCTION LLC">{{"EMIRATES FARM FOR LIVESTOCK AND AGRICULTURAL PRODUCTION LLC"}}</option>
      <option value="SAWHENY FOODSTUFF TRADING CO LLC">{{"SAWHENY FOODSTUFF TRADING CO LLC"}}</option>
      <option value="FRESH FRUITS COMPANY VEGETABLES & FRUIT TRADING LLC">{{"FRESH FRUITS COMPANY VEGETABLES & FRUIT TRADING LLC"}}</option>
      <option value="FRESHONTABLE DWC-LLC">{{"FRESHONTABLE DWC-LLC"}}</option>
      <option value="FRESH LEAF FOODSTUFF TRADING LLC">{{"FRESH LEAF FOODSTUFF TRADING LLC"}}</option>
      <option value="GULF FRUITS TRADE COMPANY LLC">{{"GULF FRUITS TRADE COMPANY LLC"}}</option>
      <option value="GHAZI ALHAJERI">{{"GHAZI ALHAJERI"}}</option>
      <option value="GLOBAL FRESH FRUITS AND VEGETABLES L.L.C">{{"GLOBAL FRESH FRUITS AND VEGETABLES L.L.C"}}</option>
      <option value="GRANDIOSE SUPERMARKET SOLE PROPRIETORSHIP L.L.C.">{{"GRANDIOSE SUPERMARKET SOLE PROPRIETORSHIP L.L.C."}}</option>
      <option value="JALEEL FRESH PRODUCE LLC (BRANCH)">{{"JALEEL FRESH PRODUCE LLC (BRANCH)"}}</option>
      <option value="KIBSONS INTERNATIONAL LLC">{{"KIBSONS INTERNATIONAL LLC"}}</option>
      <option value="LEVARHT GLOBAL FRUIT AND VEGETABLES TRADING LLC">{{"LEVARHT GLOBAL FRUIT AND VEGETABLES TRADING LLC"}}</option>
      <option value="LULU HYPERMARKET LLC - CPD DUBAI">{{"LULU HYPERMARKET LLC - CPD DUBAI"}}</option>
      <option value="LULU HYPERMARKET LLC - ABU DHABI">{{"LULU HYPERMARKET LLC - ABU DHABI"}}</option>
      <option value="MAEN AHMAD HAMADEH IDRIS">{{"MAEN AHMAD HAMADEH IDRIS"}}</option>
      <option value="MAJID AL FUTTAIM HYPERMARKETS LLC">{{"MAJID AL FUTTAIM HYPERMARKETS LLC"}}</option>
      <option value="N.R.T.C. DUBAI INTERNATIONAL VEGETABLES & FRUITS TRADING LLC">{{"N.R.T.C. DUBAI INTERNATIONAL VEGETABLES & FRUITS TRADING LLC"}}</option>
      <option value="ONE DAY ONE FRUIT TRADING - FZE">{{"ONE DAY ONE FRUIT TRADING - FZE"}}</option>
      <option value="SADAT FOODSTUFF TRADING LLC">{{"SAMPLE TO PURE HARVEST MANAGEMENT"}}</option>
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
      <option value="AL MANAL FRESH FOODS L.L.C">{{"AL MANAL FRESH FOODS L.L.C"}}</option>
      <option value="Sawheny Foodstuff Trading CO LLC">{{"Sawheny Foodstuff Trading CO LLC"}}</option>
      <option value="NASIK FRUIT & VEG LLC">{{"NASIK FRUIT & VEG LLC"}}</option>
      <option value="GOOD DEAL GENERAL TRADING LLC">{{"GOOD DEAL GENERAL TRADING LLC"}}</option>
      <option value="BADIA AL SAHRA AGRICULTURAL L.L.C">{{"BADIA AL SAHRA AGRICULTURAL L.L.C"}}</option>
      <option value="CLASSIC FINE FOODSTUFF TRADING L.L.C">{{"CLASSIC FINE FOODSTUFF TRADING L.L.C"}}</option>
      <option value="HeroGo FZ-LLC">{{"HeroGo FZ-LLC"}}</option>
      <option value="INTERCITY TRADING LLC">{{"INTERCITY TRADING LLC"}}</option>
      <option value="Nesto">{{"Nesto"}}</option>
      <option value="ONE DAY ONE FRUIT TRADING - FZE">{{"ONE DAY ONE FRUIT TRADING - FZE"}}</option>
      <option value="CAPE FRESH INDUSTRIES L.L.C">{{"CAPE FRESH INDUSTRIES L.L.C"}}</option>
      <option value="AL BAKRAWE GENERAL TRADING L.L.C">{{"AL BAKRAWE GENERAL TRADING L.L.C"}}</option>
      <option value="BEST PICK VEGETABLES & FRUITS TRADING CO. L.L.C">{{"BEST PICK VEGETABLES & FRUITS TRADING CO. L.L.C"}}</option>
      <option value="KARIMAN FOODSTUFF TRADING L.L.C">{{"KARIMAN FOODSTUFF TRADING L.L.C"}}</option>
      <option value="SHAHID AND MOHEUDDIN VEGETABLES AND FRUITS TRADE L.L.C">{{"SHAHID AND MOHEUDDIN VEGETABLES AND FRUITS TRADE L.L.C"}}</option>
      <option value="DELIVERY HERO STORES DB L.L.C">{{"DELIVERY HERO STORES DB L.L.C"}}</option>
      <option value="FARM VALE FRUITS& VEGETABLE TRADING L.L.C">{{"FARM VALE FRUITS& VEGETABLE TRADING L.L.C"}}</option>
      <option value="Sultan Center for Trading & General Contracting LLC">{{"Sultan Center for Trading & General Contracting LLC"}}</option>
      <option value="BERRY MOUNT VEGETABLES AND FRUIT TRADING L.L.C">{{"BERRY MOUNT VEGETABLES AND FRUIT TRADING L.L.C"}}</option>
      <option value="ISTANBUL SUPERMARKET L.L.C">{{"ISTANBUL SUPERMARKET L.L.C"}}</option>
      <option value="IBRAHIM JOYNOB INTERNATIONAL TRADING LLC">{{"IBRAHIM JOYNOB INTERNATIONAL TRADING LLC"}}</option>
      <option value="TOMATO AND BASILICO FOODSTUFF TRADING LLC">{{"TOMATO AND BASILICO FOODSTUFF TRADING LLC"}}</option>
      <option value="FARZANA TRADING LLC">{{"FARZANA TRADING LLC"}}</option>
      <option value="SOUQ MANBAT SUPERMARKET SOLE PROPRIETORSHIP.L L C">{{"SOUQ MANBAT SUPERMARKET SOLE PROPRIETORSHIP.L L C"}}</option>
      <option value="TAAZA QUALITY FOODSTUFF TRADING L.L.C">{{"TAAZA QUALITY FOODSTUFF TRADING L.L.C"}}</option>
      <option value="GMG CONSUMER LLC">{{"GMG CONSUMER LLC"}}</option>
   </select>   
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Complaint Category #1</label>
        <select class="form-control w-25"  id="source" name="complaint_category_1" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">
        <option value="{{$complaint->complaint_category_1}}" selected="selected">{{$complaint->complaint_category_1}}</option>     
        <option value="100 - Product Quality">100 - Product Quality</option>
        <option value="200 - Service quality">200 - Service quality</option>
        <option value="300 - Admin error">300 - Admin Error</option>
        <option value="400 - Customer Error">400 - Customer Error</option>
        </select>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label">Complaint Category #2</label> 
    <!--<div class="sub_category_div" id="sub_category_div">Status:-->
     <!-- <script class="form-control w-25"  type="text/javascript" language="JavaScript"> -->
     <select class="form-control w-25"  name="complaint_category_2" id="status"><option value="{{$complaint->complaint_category_2}}">{{$complaint->complaint_category_2}}</option></select>'
     <!-- </script> -->
       
    </div>

   </div>
   <div style= "padding-left:45px" class ="form-group row">
    <label class="col-sm-2 col-form-label">Additional Details</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea type="text" name="complaint_sub_category" class="form-control w-25" value="{{$complaint->complaint_sub_category}}" cols="100" rows="4"/>
    {{$complaint->complaint_sub_category}}</textarea>
   </div>
   <br/>
  <div style= "padding-left:55px" class="form-group row">
    <label style="width:150px;" >Batch Code</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="batch_code" class="form-control w-25" placeholder="Enter Batch Code" value= "{{$complaint->batch_code}}" cols= "100" rows="4"/>
  </div>
  <br/>
   <div style= "float:right;" class="form-group row">
   <label style="width:150px;" >Product Type</label>
   <select  style="width:150px;border: 1px solid #ced4da;"  id="selectProduct" name="product_type" required focus>
    <option value="{{$complaint->product_type}}" selected="selected">{{$complaint->product_type}}</option>        
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
                <option value="Family Box">Family Box</option>
                <option value="Yellow TOV">Yellow TOV</option>
                <option value="Yoom">Yoom</option>
                <option value="Strawberry - Albion">Strawberry - Albion</option>  
                <option value="Strawberry - Aurora Karima">Strawberry - Aurora Karima</option>
                <option value="Strawberry - Bravura">Strawberry - Bravura</option>
                <option value="Strawberry - Carbillo">Strawberry - Carbillo</option>
                <option value="Strawberry - Furore">Strawberry - Furore</option>
                <option value="Strawberry - Murano">Strawberry - Murano</option>
                <option value="Strawberry - San Andreas">Strawberry - San Andreas</option>
                <option value="Red Lettuce">Red Lettuce</option>
                <option value="Green Lettuce">Green Lettuce</option>
                <option value="Baby Spinach">Baby Spinach</option>
                <option value="Rucola">Rucola</option>
                <option value="Mix Salad">Mix Salad</option>
                <option value="Leafy">Leafy</option>
                <option value="Eve Cherry Red ">Eve Cherry Red</option>
                <option value="Eve Yellow Cherry">Eve Yellow Cherry</option>
                <option value="Eve Red Candy">Eve Red Candy</option>
                <option value="Eve Mix Candy">Eve Mix Candy</option>
                <option value="Beef Tomatoes">Beef Tomatoes</option>
                <option value="Melon">Melon</option>
                <option value="Raspberry">Raspberry</option>
                <option value="Blackberry">Blackberry</option>
                <option value="Capsicum">Capsicum</option>
                <option value="Tomato">Tomato</option>
                <option value="Strawberry">Strawberry</option>

  </select>
  </div>
  </div>
  <div style= "padding-left:55px" class="form-group row">
    <label class="col-sm-2 col-form-label">Product Details</label>
    <input type="text" name="product_type_2" class="form-control w-25" placeholder="Enter Product details" value= "{{$complaint->product_type_2}}" cols= 100 , rows=4/>
  </div>
  <div style= "padding-left:55px" class="form-group row">
    <label class="col-sm-2 col-form-label">Quality</label>
    <select class="form-control w-25" id="selectProduct" name="class" required focus>
    <option value="{{$complaint->class}}" selected="selected">{{$complaint->class}}</option> 
    <option value="Class 1">Class 1</option>
    <option value="Class 2">Class 2</option>
    <option value="Class 3">Class 3</option>
  </select>
  </div>
  
  <div style= "padding-left:55px" class="form-group row">
    <label class="col-sm-2 col-form-label">Quantity Returned</label>
    <input type="decimal" name="quantity_returned" class="form-control w-25" placeholder="Enter KGs" value= "{{$complaint->quantity_returned}}" cols=100 , rows= 4 />
  </div>
  <div style= "padding-left:55px" class="form-group row">
    <label class="col-sm-2 col-form-label">Financial Impact</label>
    <input type="decimal" name="fin_impact" class="form-control w-25" placeholder="Enter Value" value= "{{$complaint->fin_impact}}" cols=100, rows= 4 />
  </div>
  <div style= "padding-left:55px" class="form-group row">
    <label class="col-sm-2 col-form-label">RCA</label>
    <input type="text" name="RCA" class="form-control w-25" placeholder="Enter RCA details" value= "{{$complaint->RCA}}" cols= 100 , rows=4/>
  </div>
  <div style= "padding-left:55px" class="form-group row">
    <label class="col-sm-2 col-form-label">Internal Resolution</label>
    <input type="text" name="internal_resolution" class="form-control w-25" placeholder="Enter Internal Resolution" value= "{{$complaint->internal_resolution}}" cols= 100 , rows=4/>
  </div>
  <div style= "padding-left:55px" class="form-group row">
    <label class="col-sm-2 col-form-label">Customer Resolution</label>
    <input type="text" name="customer_resolution" class="form-control w-25" placeholder="Enter Customer Resolution" value= "{{$complaint->customer_resolution}}" cols= 100 , rows=4/>
  </div>
  <br />
   <div class="form-group">
    <input style="position: relative; left: 250px"  type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection