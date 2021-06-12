@extends('layouts.app')

@section('header')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

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
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
  <form method="post" action="{{url('safety')}}">
   {{csrf_field()}}
 
 
    <div class="form-group w-25">
    <input type="date" name="date_received" class="form-control" id="dob"  placeholder="Enter Complaint Date"/>
   </div>
   
   <div class="form-group w-25">
    <input type="text" name="category" class="form-control" value="N/A"/>
   </div>
   
   <div class="form-group w-25">
    <input type="text" name="sub_category" class="form-control" value="NA"/>
   </div>

   <div class="form-group w-25">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
        </div>
    </div>
</div>
@endsection
