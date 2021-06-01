
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
  <h3 aling="center">Add Meter Readings</h3>
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
   <a href="{{route('meter_readings.index')}}" class="btn btn-primary">View Meter Readings</a>
   <br />
   <br />
  </div>

  <form method="post" action="{{url('meter_readings')}}">
   {{csrf_field()}}
 
 
    <div class="form-group w-25">
    <input type="date" name="date_added" class="form-control" id="dob"  placeholder="Enter Readings Date"/>
   </div>

   <div class="form-group w-25">  
       <select class="form-control" id="selectmetric" name="metric" required focus>
    <option value="" disabled selected>Select Metric</option>        
    <option value="CO2">{{"CO2"}}</option>
    <option value="Water">{{"Water"}}</option>  
  </select>
  </div>

   <div class="form-group w-25">  
       <select class="form-control" id="selectreadingtype" name="reading_type" required focus>
    <option value="" disabled selected>Select Reading Type</option>        
    <option value="Refill">{{"Refill"}}</option>
    <option value="Meter reading">{{"Meter reading"}}</option>
  </select>
  </div>
   <div class="form-group w-25">
    <input type="decimal" name="value" class="form-control" placeholder="Enter Value"/>
   </div>
   
   <div class="form-group w-25">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>

@endsection
