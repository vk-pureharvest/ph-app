
@extends('layouts.app')


@section('header')
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <!-- new additions -->

</head>
<style>
div {
  padding-right: 10px;
  padding-left: 30px;
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
  

  <form method="post" action="{{url('truck_trackers')}}">
   {{csrf_field()}}
   
   <div><H4 >  Add Truck Utilization Details </H4></div>

   <div align="middle">
   <a href="{{route('truck_trackers.index')}}" class="btn btn-primary">View Truck Details</a>
   <br />
   <br />
   <br />
  </div>

<div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>
      </select>
  </div>

  <?php
  date_default_timezone_set('Asia/Dubai');
  ?>
  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Date</label>
    <input class="form-control w-25" type="date" name="date_added" value="<?php echo date('Y-m-d'); ?>"/>
  </div>

  <br />
  <div class="form-group row">
  <table class="table">
    <thead>
      <tr>
        <th>Truck Number</th>
        <th>Number of Pallets</th>
        <th>Customer</th>
        <th>KGs Loaded</th>
        <th><a href="javascript:;" type="button" class="btn btn-primary addRow" >+</a> </th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td><input type="text" name="truck_num[]" class="form-control" placeholder="Enter Truck Number" /></td>
      <td><input type="integer" name="no_of_pallets[]" class="form-control" placeholder="Enter Number of Pallets" /></td>
      <td>
        <select class="form-control" id="selectProduct" name="customer[]" required focus>
        <option value="" disabled selected>Choose Customer</option>          
        <option value="ABU DHABI CO-OPERATIVE SOCIETY (ADCOOPS)">{{"ABU DHABI CO-OPERATIVE SOCIETY (ADCOOPS)"}}</option>
      <option value="AL DAHRA AGRICULTURE LLC">{{"AL DAHRA AGRICULTURE LLC"}}</option>
      <option value="AL ZAYYAT TRADING LLC">{{"AL ZAYYAT TRADING LLC"}}</option>
      <option value="ANAZSINULABEEDEEN">{{"ANAZSINULABEEDEEN"}}</option>
      <option value="BARAKAT VEGETABLE AND FRUITS CO.">{{"BARAKAT VEGETABLE AND FRUITS CO."}}</option>
      <option value="CASH SALE">{{"CASH SALE"}}</option>
      <option value="EMIRATES FARM FOR LIVESTOCK AND AGRICULTURAL PRODUCTION LLC">{{"EMIRATES FARM FOR LIVESTOCK AND AGRICULTURAL PRODUCTION LLC"}}</option>
      <option value="FRESH FRUITS COMPANY VEGETABLES & FRUIT TRADING LLC">{{"FRESH FRUITS COMPANY VEGETABLES & FRUIT TRADING LLC"}}</option>
      <option value="FRESHONTABLE DWC-LLC">{{"FRESHONTABLE DWC-LLC"}}</option>
      <option value="FRESH LEAF FOODSTUFF TRADING LLC">{{"FRESH LEAF FOODSTUFF TRADING LLC"}}</option>
      <option value="GULF FRUITS TRADE COMPANY LLC">{{"GULF FRUITS TRADE COMPANY LLC"}}</option>
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
      <option value="ONE DAY ONE FRUIT TRADING - FZE">{{"ONE DAY ONE FRUIT TRADING - FZE"}}</option>
      <option value="SAMPLE TO PURE HARVEST MANAGEMENT">{{"SAMPLE TO PURE HARVEST MANAGEMENT"}}</option>
      <option value="SAMPLES TO NEW CUSTOMERS">{{"SAMPLES TO NEW CUSTOMERS"}}</option>
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
        </td>
        <td><input class="form-control" type="decimal" name="kgs_loaded[]" class="form-control" placeholder="Enter KGs"/></td>
        <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
      </tr>
     </tbody>
  </table>
</div>
<br />
<div class="form-group w-25">
    <input style="position: relative; left: 250px" type="submit" value="Submit" class="btn btn-primary" />
    </form>
   </div>

    
  </form>
</div>
</div>
  <script>
$('thead').on('click', '.addRow', function(){
    var tr='<tr>'+
    '<td><input type="text" name="truck_num[]" class="form-control" placeholder="Enter Truck Number" /></td>'+
    '<td><input type="integer" name="no_of_pallets[]" class="form-control" placeholder="Enter Number of Pallets" /></td>'+
    '<td>'+
    '<select class="form-control" id="selectProduct" name="customer[]" required focus>'+
    '   <option value="" disabled selected>Choose Customer</option>          '+
    '<option value="ABU DHABI CO-OPERATIVE SOCIETY (ADCOOPS)">{{"ABU DHABI CO-OPERATIVE SOCIETY (ADCOOPS)"}}</option>'+
      '<option value="AL DAHRA AGRICULTURE LLC">{{"AL DAHRA AGRICULTURE LLC"}}</option>'+
      '<option value="AL ZAYYAT TRADING LLC">{{"AL ZAYYAT TRADING LLC"}}</option>'+
      '<option value="ANAZSINULABEEDEEN">{{"ANAZSINULABEEDEEN"}}</option>'+
      '<option value="BEST OF LATIN FOODSTUFF">{{"BEST OF LATIN FOODSTUFF"}}</option>'+
      '<option value="BARAKAT VEGETABLE AND FRUITS CO.">{{"BARAKAT VEGETABLE AND FRUITS CO."}}</option>'+
      '<option value="CASH SALE">{{"CASH SALE"}}</option>'+
      '<option value="EMIRATES FARM FOR LIVESTOCK AND AGRICULTURAL PRODUCTION LLC">{{"EMIRATES FARM FOR LIVESTOCK AND AGRICULTURAL PRODUCTION LLC"}}</option>'+
      '<option value="FRESH FRUITS COMPANY VEGETABLES & FRUIT TRADING LLC">{{"FRESH FRUITS COMPANY VEGETABLES & FRUIT TRADING LLC"}}</option>'+
      '<option value="FRESHONTABLE DWC-LLC">{{"FRESHONTABLE DWC-LLC"}}</option>'+
      '<option value="FRESH LEAF FOODSTUFF TRADING LLC">{{"FRESH LEAF FOODSTUFF TRADING LLC"}}</option>'+
      '<option value="GULF FRUITS TRADE COMPANY LLC">{{"GULF FRUITS TRADE COMPANY LLC"}}</option>'+
      '<option value="GHAZI ALHAJERI">{{"GHAZI ALHAJERI"}}</option>'+
      '<option value="GLOBAL FRESH FRUITS AND VEGETABLES L.L.C">{{"GLOBAL FRESH FRUITS AND VEGETABLES L.L.C"}}</option>'+
      '<option value="GULF FRUITS TRADE COMPANY LLC">{{"GULF FRUITS TRADE COMPANY LLC"}}</option>'+
      '<option value="JALEEL FRESH PRODUCE LLC (BRANCH)">{{"JALEEL FRESH PRODUCE LLC (BRANCH)"}}</option>'+
      '<option value="KIBSONS INTERNATIONAL LLC">{{"KIBSONS INTERNATIONAL LLC"}}</option>'+
      '<option value="LEVARHT GLOBAL FRUIT AND VEGETABLES TRADING LLC">{{"LEVARHT GLOBAL FRUIT AND VEGETABLES TRADING LLC"}}</option>'+
      '<option value="LULU HYPERMARKET LLC - CPD DUBAI">{{"LULU HYPERMARKET LLC - CPD DUBAI"}}</option>'+
      '<option value="LULU HYPERMARKET LLC - ABU DHABI">{{"LULU HYPERMARKET LLC - ABU DHABI"}}</option>'+
      '<option value="MAEN AHMAD HAMADEH IDRIS">{{"MAEN AHMAD HAMADEH IDRIS"}}</option>'+
      '<option value="MAJID AL FUTTAIM HYPERMARKETS LLC">{{"MAJID AL FUTTAIM HYPERMARKETS LLC"}}</option>'+
      '<option value="N.R.T.C. DUBAI INTERNATIONAL VEGETABLES & FRUITS TRADING LLC">{{"N.R.T.C. DUBAI INTERNATIONAL VEGETABLES & FRUITS TRADING LLC"}}</option>'+
      '<option value="ONE DAY ONE FRUIT TRADING - FZE">{{"ONE DAY ONE FRUIT TRADING - FZE"}}</option>'+
      '<option value="SAMPLE TO PURE HARVEST MANAGEMENT">{{"SAMPLE TO PURE HARVEST MANAGEMENT"}}</option>'+
      '<option value="SAMPLES TO NEW CUSTOMERS">{{"SAMPLES TO NEW CUSTOMERS"}}</option>'+
      '<option value="SPINNEYS DUBAI LLC">{{"SPINNEYS DUBAI LLC"}}</option>'+
      '<option value="TAMRAAT GENERAL TRADING LLC">{{"TAMRAAT GENERAL TRADING LLC"}}</option>'+
      '<option value="TFC FRUITS TRADING LLC">{{"TFC FRUITS TRADING LLC"}}</option>'+
      '<option value="TRANSMED OVERSEAS INCORPORATED S.A.">{{"TRANSMED OVERSEAS INCORPORATED S.A."}}</option>'+
      '<option value="T.V. VIJAYAN">{{"T.V. VIJAYAN"}}</option>'+
      '<option value="VEGBERRY MIDDLE EAST FRUITS & VEGETABLES TRADING LLC">{{"VEGBERRY MIDDLE EAST FRUITS & VEGETABLES TRADING LLC"}}</option>'+
      '<option value="VIP SAMPLE BOX">{{"VIP SAMPLE BOX"}}</option>'+
      '<option value="Other">{{"Other"}}</option>'+
      '  </select> '+ 
     '  </td>'+
     '        <td><input class="form-control" type="decimal" name="kgs_loaded[]" class="form-control" placeholder="Enter KGs"/></td>'+
     '  <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>'+
      '</tr>';

        $('tbody').append(tr);
});

$('tbody').on('click', '.deleteRow', function(){
    $(this).parent().parent().remove();
});

</script>
@endsection
