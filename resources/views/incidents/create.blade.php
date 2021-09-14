
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
.borderless td, .borderless th {
    border: none;
}

div {
  padding-right: 30px;
  padding-left: 40px;
  margin-bottom:10px;
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
  
  <form method="post" action="{{url('incidents')}}">
   {{csrf_field()}}
 
   <div><H4 >  Report Safety Incident </H4></div>
  <br />
  
     <div class="form-group row">
      <label class="col-sm-2 col-form-label">Reported by</label>
      <input class="form-control w-25" type="text"  name="reported_by" class="form-control"/>
      
      <label class="col-sm-2 col-form-label">Date of Report</label>
      <input class="form-control w-25" type="date"  name="date_received"  id="dob" class="form-control"/>
      </div>

      
     <div class="form-group row">
      <label class="col-sm-2 col-form-label">Title</label>
      <input class="form-control w-25" type="text" name="title"/>

      <label class="col-sm-2 col-form-label">Type of Incident:</label>
      <select class="form-control w-25" id="selectCategory" name="type_of_incident" required focus>
                            <option value="" disabled selected>Select Incident Type</option>        
                            <option value="Near Miss">{{"Near Miss"}}</option>
                            <option value="Minor Injury">{{"Minor Injury"}}</option>
                            <option value="Significant Injury">{{"Significant Injury"}}</option>
                            </select>
      </div>
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Site</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>
      </select>

      </div>
  <br />
      <div><H4 > Employee Incident Information</H4></div>
  <br />

      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Employee Name</label>
      <input class="form-control w-25" type="text"  name="emp_name" class="form-control"/>
      
      <label class="col-sm-2 col-form-label">Employee Title/Role</label>
      <input class="form-control w-25" type="text"  name="emp_title" class="form-control"/>
      </div>

      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Location</label>
      <input class="form-control w-25" type="text"  name="location" class="form-control"/>
      
      <label class="col-sm-2 col-form-label">Specific Area of Location</label>
      <input class="form-control w-25" type="text"  name="sp_loc" class="form-control"/>
      </div>

      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Additional Person(s) Involved</label>
      <textarea class="form-control w-75" type="text" name="addn_people" cols="100" rows="1"></textarea>
      </div>
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Witnesses</label>
      <textarea class="form-control w-75" type="text" name="witnesses" cols="100" rows="1"></textarea>
      </div>

      <br />
      <div><H4 > Incident Details</H4></div>
        <br />
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Incident Description Including Events Leading to the Incident</label>
      <textarea class="form-control w-75" type="text" name="incident_desc" cols="100" rows="4"></textarea>
      </div>
      
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Root Causes for the Safety Incident</label>
      <textarea class="form-control w-75" type="text" name="root_cause" cols="100" rows="4"></textarea>
      </div>
      
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Resulting Action Executed</label>
      <textarea class="form-control w-75" type="text" name="action_exec" cols="100" rows="4"></textarea>
      </div>
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Action Plan to Avoid such Instances in Future</label>
      <textarea class="form-control w-75" type="text" name="action_plan" cols="100" rows="4"></textarea>
      </div>
      <br />
   <div class="form-group w-25">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" />
   </div>  
  </form>
 </div>
</div>

@endsection
