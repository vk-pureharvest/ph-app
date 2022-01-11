
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
<style>
div {
  padding-right: 30px;
  padding-left: 30px;
}
table.center {
  margin-left: auto;
  margin-right: auto;
}
</style>

@endsection

@section('content')

<div class="row" padding="10px 20px 10px 200px">
 <div class="col-md-12">
  <br />
  <h3 align="center">Harvesting Schedule</h3>
  <br />
  <table border=3 data-align="center">
   <tr>
    <th>Crop Type</th>
    <th>Number of Harvests</th>
    <th>Rows Harvested</th>
    <th>Buffer(%)</th>
    <th>Monday Harvest</th>
    <th>Tuesday Harvest</th>
    <th>Wednesday Harvest</th>
    <th>Thursday Harvest</th>
    <th>Friday Harvest</th>
    <th>Saturday Harvest</th>
    <th>Edit</th>
   </tr>
   @foreach($harvest_schedules as $row)
   <tr>
    <td >{{$row['crop_type']}}</td>
    <td align="center">{{$row['num_of_harvests']}}</td>
    <td align="center">{{$row['total_rows']}}</td>
    <td align="center">{{$row['buffer']}}</td>
    <td align="center">{{$row['mon_harvest']}}</td>
    <td align="center">{{$row['tue_harvest']}}</td>
    <td align="center">{{$row['wed_harvest']}}</td>
    <td align="center">{{$row['thu_harvest']}}</td>
    <td align="center">{{$row['fri_harvest']}}</td>
    <td align="center">{{$row['sat_harvest']}}</td>
    <td align="center"><a href="{{action('HarvestScheduleController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    
   </tr>
   @endforeach
  </table>
 </div>
</div>
<script>
$(document).ready(function(){
 $('.delete_form').on('submit', function(){
  if(confirm("Are you sure you want to delete it?"))
  {
   return true;
  }
  else
  {
   return false;
  }
 });
});
</script>
@endsection
