
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
</style>
@endsection

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Al Ain Utilities Data</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('alain_utilities.create')}}" class="btn btn-primary">Add Al Ain Utilities</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Location</th>
    <th>Date</th>
    <th>Well water P1</th>
    <th>Well water P2</th>
    <th>Well water P3</th>
    <th>Well water P4</th>
    <th>RO daily water</th>
    <th>RO reject water</th>
    <th>Mixing unit 1 </th>
    <th>Mixing unit 2</th>
    <th>Transport unit 1 </th>
    <th>Transport unit 2</th>
    <th>Pad wall 1 </th>
    <th>Pad wall 2</th>
    <th>Tap water 3</th>
    <th>Tap water 4</th>
    <th>Condens- ation </th>
    <th>Chiller</th>
    <th>Mixing unit 50</th>
    <th>Mixing unit 60 </th>
    <th>Electricity meter 1</th>
    <th>Electricity meter 2</th>
    <th>CO2 Leafy Greens</th>
    <th>CO2 Tomatoes</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($alain_utilities as $row)
   <tr>
    <td>{{$row['site_name']}}</td>
    <td>{{$row['date_added']}}</td>
    <td>{{$row['well_water_p1']}}</td>
    <td>{{$row['well_water_p2']}}</td>
    <td>{{$row['well_water_p3']}}</td>
    <td>{{$row['well_water_p4']}}</td>
    <td>{{$row['ro_daily_water']}}</td>
    <td>{{$row['ro_reject_water']}}</td>
    <td>{{$row['mixing_unit_1']}}</td>
    <td>{{$row['mixing_unit_2']}}</td>
    <td>{{$row['transport_unit_1']}}</td>
    <td>{{$row['transport_unit_2']}}</td>
    <td>{{$row['pad_wall_1']}}</td>
    <td>{{$row['pad_wall_2']}}</td>
    <td>{{$row['tap_water_3']}}</td>
    <td>{{$row['tap_water_4']}}</td>
    <td>{{$row['condensation']}}</td>
    <td>{{$row['chiller']}}</td>
    <td>{{$row['mixing_unit_50']}}</td>
    <td>{{$row['mixing_unit_60']}}</td>
    <td>{{$row['electric_meter_1']}}</td>
    <td>{{$row['electric_meter_2']}}</td>
    <td>{{$row['co2_leafy_green']}}</td>
    <td>{{$row['co2_tomatoes']}}</td>

    <td><a href="{{action('AlAinUtilityController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td>
     <form method="post" class="delete_form" action="{{action('AlAinUtilityController@destroy', $row['id'])}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Delete</button>
     </form>
    </td>
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