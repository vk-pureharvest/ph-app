
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
  <br />
  <h3>Edit Meter Readings</h3>
  <br />
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
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <select class="form-control" id="site" name="site_name" required focus>
    <option value="{{$meter_reading->site_name}}" selected="selected">{{$meter_reading->site_name}}</option>    
    <option value="Nahel">{{"Nahel"}}</option>
  </select>
  </div>
   <div class="form-group">
    <input type="date" name="date_received" class="form-control" id="dob" value="{{$meter_reading->date_received}}" placeholder="Enter Date" />
   </div>
   <div class="form-group">
   <select class="form-control" id="selectmetric" name="metric" required focus>
    <option value="{{$meter_reading->metric}}" selected="selected">{{$meter_reading->metric}}</option>        
    <option value="CO2">{{"CO2"}}</option>
    <option value="Water">{{"Water"}}</option>  
  </select>
   </div>
   <div class="form-group">
    <select class="form-control" id="reading_type" name="reading_type" required focus>
    <option value="{{$meter_reading->reading_type}}" selected="selected">{{$meter_reading->reading_type}}</option>        
    <option value="Refill">{{"Refill"}}</option>
    <option value="Meter reading">{{"Meter reading"}}</option>
    </select>
   </div>
   <div class="form-group">
    <input type="text" name="value" class="form-control" value="{{$meter_reading->value}}" placeholder="Enter Value" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection