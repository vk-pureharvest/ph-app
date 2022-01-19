
@extends('layouts.app')

@section('header')

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

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

<style>
div {
  padding-right: 30px;
  padding-left: 30px;
}
</style>

@endsection

@section('content')


<div class="row">
 <div class="col-md-12">
  <br />
  <h3>Edit Truck Temperature</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('TruckTempController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$truck_temps->site_name}}" selected="selected">{{$truck_temps->site_name}}</option>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">Nahel</option>
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Date Added</label>
      <input class="form-control w-25"  type="date" name="date_added" class="form-control" id="dob" value="{{$truck_temps->date_added}}"/>
  </div>

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Truck Number</label>
    <input class="form-control w-25" type="integer" name="truck_num" class="form-control" value="{{$truck_temps->truck_num}}" placeholder="Enter Truck Number" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Truck Temperature</label>
    <input class="form-control w-25" type="decimal" name="truck_temp" class="form-control" value="{{$truck_temps->truck_temp}}" placeholder="Enter Temperature" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Driver Name</label>
    <input class="form-control w-25" type="text" name="driver_name" class="form-control" value="{{$truck_temps->driver_name}}" placeholder="Enter Driver Name" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Product Name</label>
    <input class="form-control w-25" type="text" name="product_name" class="form-control" value="{{$truck_temps->product_name}}" placeholder="Enter Product Name" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Truck Cleaning</label>
      <select class="form-control w-25" id="selectCategory" name="truck_clean" required focus>
      <option value="{{$truck_temps->truck_clean}}" selected="selected">{{$truck_temps->truck_clean}}</option>
        <option value="Yes" selected>Yes</option>        
        <option value="No">No</option>
      </select>
  </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Comments</label>
    <textarea type="text" name="comments" class="form-control w-25" value="{{$truck_temps->comments}}" cols="100" rows="4"/>{{$truck_temps->comments}}</textarea></div>
   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection