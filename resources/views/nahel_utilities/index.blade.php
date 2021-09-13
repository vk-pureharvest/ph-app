
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
  <h3 align="center">Nahel Utilities Data</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('nahel_utilities.create')}}" class="btn btn-primary">Add Nahel Utilities</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Location</th>
    <th>Date</th>
    <th>Electra 1</th>
    <th>Electra 2</th>
    <th>Reject Water</th>
    <th>Supply Water Corridor 1</th>
    <th>Supply Water Corridor 2</th>
    <th>Irrigation Water</th>
    <th>Ground Water</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($nahel_utilities as $row)
   <tr>
    <td>{{$row['site_name']}}</td>
    <td>{{$row['date_added']}}</td>
    <td>{{$row['electra_1']}}</td>
    <td>{{$row['electra_2']}}</td>
    <td>{{$row['reject_water']}}</td>
    <td>{{$row['supply_water_1']}}</td>
    <td>{{$row['supply_water_2']}}</td>
    <td>{{$row['irrigation_water']}}</td>
    <td>{{$row['ground_water']}}</td>
    <td><a href="{{action('NahelUtilityController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td>
     <form method="post" class="delete_form" action="{{action('NahelUtilityController@destroy', $row['id'])}}">
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