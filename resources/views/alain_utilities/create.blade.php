
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
  

  <form method="post" action="{{url('alain_utilities')}}">
   {{csrf_field()}}
   
   <div><H4 >  Add Nahel Utilities </H4></div>

   <div align="middle">
   <a href="{{route('alain_utilities.index')}}" class="btn btn-primary">View Al Ain Utilities Data</a>
   <br />
   <br />
   <br />
  </div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
        <option value="Al Ain" selected>Al Ain</option>  
      </select>
      <label class="col-sm-2 col-form-label">Recorded Date</label>
    <input class="form-control w-25" type="date" name="date_added" class="form-control" id="dob"  placeholder="Enter Date"/>
       </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Well Water P1</label>
    <input type="decimal" name="well_water_p1" class="form-control w-25" />
    <label class="col-sm-2 col-form-label">Pad Wall 1</label>
    <input type="decimal" name="pad_wall_1" class="form-control w-25" />
  </div>
  
  <div class="form-group row">
  <label class="col-sm-2 col-form-label">Well Water P2</label>
    <input type="decimal" name="well_water_p2" class="form-control w-25" />
  <label class="col-sm-2 col-form-label">Pad Wall 2</label>
    <input type="decimal" name="pad_wall_2" class="form-control w-25"/>
  </div>
 
  <div class="form-group row">
  <label class="col-sm-2 col-form-label">Well Water P3</label>
    <input type="decimal" name="well_water_p3" class="form-control w-25" />
    <label class="col-sm-2 col-form-label">Tap Water 3</label>
    <input type="decimal" name="tap_water_3" class="form-control w-25" />
  </div>
 
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Well Water P4</label>
    <input type="decimal" name="well_water_p4" class="form-control w-25" />
    <label class="col-sm-2 col-form-label">Tap Water 4</label>
    <input type="decimal" name="tap_water_4" class="form-control w-25" />
  </div>
 
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">RO Daily Water</label>
    <input type="decimal" name="ro_daily_water" class="form-control w-25" />
    <label class="col-sm-2 col-form-label">Condensation </label>
    <input type="decimal" name="condensation" class="form-control w-25" />
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">RO Reject Water</label>
    <input type="decimal" name="ro_reject_water" class="form-control w-25" />
    <label class="col-sm-2 col-form-label">Chiller </label>
    <input type="decimal" name="chiller" class="form-control w-25" />
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Mixing Unit 1</label>
    <input type="decimal" name="mixing_unit_1" class="form-control w-25" />
    <label class="col-sm-2 col-form-label">Mixing Unit 50</label>
    <input type="decimal" name="mixing_unit_50" class="form-control w-25" />
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Mixing Unit 2</label>
    <input type="decimal" name="mixing_unit_2" class="form-control w-25" />
    <label class="col-sm-2 col-form-label">Mixing Unit 60</label>
    <input type="decimal" name="mixing_unit_60" class="form-control w-25" />
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Transport Unit 1</label>
    <input type="decimal" name="transport_unit_1" class="form-control w-25" />
    <label class="col-sm-2 col-form-label">Electricity meter 1</label>
    <input type="decimal" name="electric_meter_1" class="form-control w-25" />
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Transport Unit 2</label>
    <input type="decimal" name="transport_unit_2" class="form-control w-25" />
    <label class="col-sm-2 col-form-label">Electricity meter 2</label>
    <input type="decimal" name="electric_meter_2" class="form-control w-25" />
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">CO2 Leafy Greens</label>
    <input type="decimal" name="co2_leafy_green" class="form-control w-25" />
    <label class="col-sm-2 col-form-label">CO2 Tomatoes</label>
    <input type="decimal" name="co2_tomatoes" class="form-control w-25" />
  </div>

<br />
<div class="form-group w-25">
    <input style="position: relative; left: 250px" type="submit" value="Submit" class="btn btn-primary" />
    </form>
   </div>

    
  </form>
</div>
</div>
@endsection