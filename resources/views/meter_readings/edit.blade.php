
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
  padding-left: 80px;
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
  <form method="post" action="{{action('Meter_ReadingsController@update', $id)}}">
   {{csrf_field()}}
  <br />
  <div><H4 >  Edit Meter Readings </H4></div>
  <br />

   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
    <select class="form-control w-25" id="site" name="site_name" required focus>
    <option value="{{$meter_reading->site_name}}" selected="selected">{{$meter_reading->site_name}}</option>    
    <option value="Al Ain">{{"Al Ain"}}</option>   
    <option value="Nahel">{{"Nahel"}}</option>
  </select>
  </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Date Added</label>
    <input type="date" name="date_received" class="form-control w-25" id="dob" value="{{$meter_reading->date_received}}" placeholder="Enter Date" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Metric</label>
   <select class="form-control w-25" id="selectmetric" name="metric" required focus>
    <option value="{{$meter_reading->metric}}" selected="selected">{{$meter_reading->metric}}</option>        
    <option value="CO2">{{"CO2"}}</option>
    <option value="Water">{{"Water"}}</option>  
  </select>
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Refill/Reading</label>
    <select class="form-control w-25" id="reading_type" name="reading_type" required focus>
    <option value="{{$meter_reading->reading_type}}" selected="selected">{{$meter_reading->reading_type}}</option>        
    <option value="Refill">{{"Refill"}}</option>
    <option value="Meter reading">{{"Meter reading"}}</option>
    </select>
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Value</label>
    <input type="text" name="value" class="form-control w-25" value="{{$meter_reading->value}}" placeholder="Enter Value" />
   </div>
   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection