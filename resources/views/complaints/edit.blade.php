
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
  <h3>Edit Complaint</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('ComplaintsController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <input type="date" name="date_received" class="form-control" id="dob" value="{{$complaint->date_received}}" placeholder="Enter Date" />
   </div>
   <div class="form-group">
    <select class="form-control" id="selectCustomer" name="customer_name" required focus>
    <option value="{{$complaint->customer_name}}" selected="selected">{{$complaint->customer_name}}</option>        
    <option value="Spinneys">{{"Spinneys"}}</option>
    <option value="Carrefour">{{"Carrefour"}}</option>
    <option value="Wholesale">{{"Wholesale"}}</option>
   </select>   
   </div>
   <div class="form-group">
    <select class="form-control" id="selectCategory" name="complaint_category" required focus>
    <option value="{{$complaint->complaint_category}}" selected="selected">{{$complaint->complaint_category}}</option>        
    <option value="Quality">{{"Quality"}}</option>
    <option value="Quantity">{{"Quantity"}}</option>
    <option value="Delivery">{{"Delivery"}}</option>    
    <option value="Other">{{"Other"}}</option>
  </select>

   </div>
   <div class="form-group">
    <input type="text" name="complaint_sub_category" class="form-control" value="{{$complaint->complaint_sub_category}}" placeholder="Enter Product type" />
   </div>
   <div class="form-group">

   <select class="form-control" id="selectProduct" name="product_type" required focus>
    <option value="{{$complaint->product_type}}" selected="selected">{{$complaint->product_type}}</option>        
    <option value="COV">{{"COV"}}</option>
    <option value="TOV">{{"TOV"}}</option>
    <option value="Candy">{{"Candy"}}</option>   
  </select>
  </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection