
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
  <h3>Edit Production data</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('HarvestScheduleController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Number of Harvests per week</label>
    <input class="form-control w-25" type="decimal" name="num_of_harvests" class="form-control" value="{{$harvest_schedules->num_of_harvests}}" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Total rows per crop</label>
    <input class="form-control w-25" type="decimal" name="total_rows" class="form-control" value="{{$harvest_schedules->total_rows}}" />
   </div>
   
   
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Buffer</label>
    <input class="form-control w-25" type="decimal" name="buffer" class="form-control" value="{{$harvest_schedules->buffer}}" />
   </div>
   
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Saturday Harvest Schedule</label>
    <input class="form-control w-25" type="decimal" name="sat_harvest" class="form-control" value="{{$harvest_schedules->sat_harvest}}" />
   </div>

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Sunday Harvest Schedule</label>
    <input class="form-control w-25" type="decimal" name="sun_harvest" class="form-control" value="{{$harvest_schedules->sun_harvest}}" />
   </div>

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Monday Harvest Schedule</label>
    <input class="form-control w-25" type="decimal" name="mon_harvest" class="form-control" value="{{$harvest_schedules->mon_harvest}}" />
   </div>

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Tuesday Harvest Schedule</label>
    <input class="form-control w-25" type="decimal" name="tue_harvest" class="form-control" value="{{$harvest_schedules->tue_harvest}}" />
   </div>

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Wednesday Harvest Schedule</label>
    <input class="form-control w-25" type="decimal" name="wed_harvest" class="form-control" value="{{$harvest_schedules->wed_harvest}}" />
   </div>

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Thursday Harvest Schedule</label>
    <input class="form-control w-25" type="decimal" name="thu_harvest" class="form-control" value="{{$harvest_schedules->thu_harvest}}" />
   </div>

   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection