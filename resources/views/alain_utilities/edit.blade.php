
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
    
     
<style>
div {
  padding-right: 30px;
  padding-left: 30px;
}
</style>
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

    </script>



@endsection

@section('content')


<div class="row">
 <div class="col-md-12">
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('AlAinUtilityController@update', $id)}}">
   {{csrf_field()}}
   

   <input type="hidden" name="_method" value="PATCH" />
   
  <br />
  <h3>Edit Utitlies Readings</h3>
  <br />

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
    <select class="form-control w-25" id="site" name="site_name" required focus>
    <option value="{{$alain_utilities->site_name}}" selected="selected">{{$alain_utilities->site_name}}</option>    
    <option value="Al Ain">{{"Al Ain"}}</option>
  </select> 
    <label class="col-sm-2 col-form-label">Date Added</label>
    <input class="form-control w-25" type="date" name="date_added" class="form-control" id="dob" value="{{$alain_utilities->date_added}}" placeholder="Enter Date" />
   </div>     
   
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Condensation </label>
    <input type="decimal" name="condensation" class="form-control w-25"placeholder="Enter Value" value="{{$alain_utilities->condensation}}" />
    <label class="col-sm-2 col-form-label">CO2 Tomatoes</label>
  <input type="decimal" name="co2_tomatoes" class="form-control w-25" placeholder="Enter Value" value="{{$alain_utilities->co2_tomatoes}}"/>
</div>

  <div class="form-group row">
  <label class="col-sm-2 col-form-label">CO2 Leafy Greens</label>
  <input type="decimal" name="co2_leafy_green" class="form-control w-25" placeholder="Enter Value" value="{{$alain_utilities->co2_leafy_green}}"/>
 
    <label class="col-sm-2 col-form-label">Chiller </label>
    <input type="decimal" name="chiller" class="form-control w-25" placeholder="Enter Value" value="{{$alain_utilities->chiller}}"/>
  </div> 
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Well water P1</label>
    <input type="decimal" name="well_water_p1" class="form-control w-25" placeholder="Enter Value" value="{{$alain_utilities->well_water_p1}}"/>
    <label class="col-sm-2 col-form-label">Pad Wall 1</label>
    <input type="decimal" name="pad_wall_1" class="form-control w-25"placeholder="Enter Value" value="{{$alain_utilities->pad_wall_1}}"/>
  </div> 
  <div class="form-group row">
  <label class="col-sm-2 col-form-label">Well Water P2</label>
    <input type="decimal" name="well_water_p2" class="form-control w-25" placeholder="Enter Value" value="{{$alain_utilities->well_water_p2}}" />
  <label class="col-sm-2 col-form-label">Pad Wall 2</label>
    <input type="decimal" name="pad_wall_2" class="form-control w-25" placeholder="Enter Value" value="{{$alain_utilities->pad_wall_2}}"/>
  </div>    
  
  <div class="form-group row">
  <label class="col-sm-2 col-form-label">Well Water P3</label>
    <input type="decimal" name="well_water_p3" class="form-control w-25"placeholder="Enter Value" value="{{$alain_utilities->well_water_p3}}" />
    <label class="col-sm-2 col-form-label">Tap Water 3</label>
    <input type="decimal" name="tap_water_3" class="form-control w-25"placeholder="Enter Value" value="{{$alain_utilities->tap_water_3}}" />
  </div>
 
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Well Water P4</label>
    <input type="decimal" name="well_water_p4" class="form-control w-25"placeholder="Enter Value" value="{{$alain_utilities->well_water_p4}}" />
    <label class="col-sm-2 col-form-label">Tap Water 4</label>
    <input type="decimal" name="tap_water_4" class="form-control w-25"placeholder="Enter Value" value="{{$alain_utilities->tap_water_4}}" />
  </div>
 
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Mixing Unit 1</label>
    <input type="decimal" name="mixing_unit_1" class="form-control w-25"placeholder="Enter Value" value="{{$alain_utilities->mixing_unit_1}}" />
    <label class="col-sm-2 col-form-label">Mixing Unit 50</label>
    <input type="decimal" name="mixing_unit_50" class="form-control w-25" placeholder="Enter Value" value="{{$alain_utilities->mixing_unit_50}}"/>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Mixing Unit 2</label>
    <input type="decimal" name="mixing_unit_2" class="form-control w-25" placeholder="Enter Value" value="{{$alain_utilities->mixing_unit_2}}"/>
    <label class="col-sm-2 col-form-label">Mixing Unit 60</label>
    <input type="decimal" name="mixing_unit_60" class="form-control w-25"placeholder="Enter Value" value="{{$alain_utilities->mixing_unit_60}}" />
  </div>

    <div class="form-group row">
    <label class="col-sm-2 col-form-label">Electricity meter 2</label>
    <input type="decimal" name="electric_meter_2" class="form-control w-25" placeholder="Enter Value" value="{{$alain_utilities->electric_meter_2}}"/>
  </div>


  
  <br />
   <div class="form-group">
    <input style="position: relative; left: 250px"  type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection