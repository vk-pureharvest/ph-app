
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
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- new additions -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
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
  <div><H4 >  Add Meter Readings </H4></div>
  <br />
  <div align="middle">
   <a href="{{route('meter_readings.index')}}" class="btn btn-primary">View Meter Readings</a>
   <br />
   <br />
  </div>

  <form method="post" action="{{url('meter_readings')}}">
   {{csrf_field()}}
 

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Date</label>
    <input class="form-control w-25" type="date" name="date_received" class="form-control" id="dob"  placeholder="Enter Complaint Date"/>
  </div>
  
  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Metric</label>
    <select class="form-control w-25" id="selectmetric" name="metric" required focus>
    <option value="" disabled selected>Select Metric</option>        
    <option value="CO2">{{"CO2"}}</option>
    <option value="Water">{{"Water"}}</option>  
  </select>
  </div>
  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Refill/Reading</label>
    <select class="form-control w-25" id="selectreadingtype" name="reading_type" required focus>
    <option value="" disabled selected>Select Reading Type</option>        
    <option value="Refill">{{"Refill"}}</option>
    <option value="Meter reading">{{"Meter reading"}}</option>
  </select>
  </div>


  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Value</label>
    <input type="decimal" name="value" class="form-control w-25" placeholder="Enter Value"/>
  </div>
   <br />
   <div class="form-group w-25">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>

@endsection
