
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
  <br />
  <h3 aling="center">Report Safety Incident</h3>
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
  
  <form method="post" action="{{url('incidents')}}">
   {{csrf_field()}}
 
   <div>
  <table class='table borderless'>
   <tr>
    <td> Reported by: <input type="text" name="reported_by"/></td>
    <td>Date of Report:<input type="date" name="date_received"  id="dob"/></td>
   </tr>
   <tr>
    <td> Title: <input type="text" name="title"/></td>
    <td>Type of incident: <select id="selectCategory" name="type_of_incident" required focus>
                            <option value="" disabled selected>Select Incident Type</option>        
                            <option value="Near Miss">{{"Near Miss"}}</option>
                            <option value="Minor Injury">{{"Minor Injury"}}</option>
                            <option value="Significant Injury">{{"Significant Injury"}}</option></td>
   </tr>
  </table>
 </div>
           <H4 >         EMPLOYEE INCIDENT INFORMATION </H4>
 <div>
 <table class='table borderless'>
   <tr>
     <td> Employee Name: <input type="text" name="emp_name"/></td>
     <td> Employee Title/Role: <input type="text" name="emp_title"/></td>
   </tr>
   <tr>
    <td>Location: <input type="text" name="location"/></td>
    <td>Specific Area of Location: <input type="text" name="sp_loc"/></td>
   </tr>
  </table>
 </div>
 <div>
    Additional Person(s) Involved: <textarea type="text" name="addn_people" cols="100" rows="1"></textarea>
   </div>
 <div>
    Witnesses: <textarea type="text" name="witnesses" cols="100" rows="1"></textarea>
   </div>
   
 <div>
 <div><H7> INCIDENT DESCRIPTION INCLUDING EVENTS LEADING TO THE INCIDENT </H7><div>
    <textarea white-space="pre-wrap" type="text" name="incident_desc" cols="150" rows="4"></textarea>
   </div>
   <div>
   <div><H7> ROOT CAUSES FOR THE SAFETY INCIDENT </H7><div>
    <textarea white-space="pre-wrap" type="text" name="root_cause" cols="150" rows="4"></textarea>
   </div>
   <div>
   <div><H7>   RESULTING ACTION EXECUTED    </H7><div>
    <textarea white-space="pre-wrap" type="text" name="action_exec" cols="150" rows="4"></textarea>
   </div>
  
   <div>
   <div><H7> ACTION PLAN TO AVOID SUCH INSTANCES IN FUTURE  </H7><div>
    <textarea white-space="pre-wrap" type="text" name="action_plan" cols="150" rows="4"></textarea>
   </div>
   
   <div class="form-group w-25">
    <input type="submit" class="btn btn-primary" />
   </div>  
  </form>
 </div>
</div>

@endsection
