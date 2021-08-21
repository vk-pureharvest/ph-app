
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
  <h3>Edit Cold Storage data</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('ColdStorageTempController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$cold_storage_temps->site_name}}" selected="selected">{{$cold_storage_temps->site_name}}</option>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Date Added</label>
      <input class="form-control w-25"  type="date" name="date_added" class="form-control" id="dob" value="{{$cold_storage_temps->date_added}}"/>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Time Recorded</label>
      <select class="form-control w-25" type="time" id="selectCategory" name="time_recorded" required focus>
      <option value="{{$cold_storage_temps->time_recorded}}" selected="selected">{{$cold_storage_temps->time_recorded}}</option>
      <option value="0:00">0:00</option> 
       <option value="4:00">4:00</option> 
       <option value="8:00">8:00</option> 
       <option value="12:00">12:00</option> 
       <option value="16:00">16:00</option> 
       <option value="20:00">20:00</option>
      </select>
  </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Temperature Recorded</label>
    <input class="form-control w-25" type="text" name="temp_recorded" class="form-control" value="{{$cold_storage_temps->temp_recorded}}" placeholder="Enter Temp" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">VISA Quality Controller</label>
    <input class="form-control w-25" type="text" name="quality_controller" class="form-control" value="{{$cold_storage_temps->quality_controller}}" placeholder="Enter Quality Controller" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">VISA Shift Team Leader</label>
    <input class="form-control w-25" type="text" name="shift_leader" class="form-control" value="{{$cold_storage_temps->shift_leader}}" placeholder="Enter Shift Leader" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Remarks</label>
    <textarea type="text" name="remarks" class="form-control w-25" value="{{$cold_storage_temps->remarks}}" cols="100" rows="4"/>{{$cold_storage_temps->remarks}}</textarea></div>
   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection