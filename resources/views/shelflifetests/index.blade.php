
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

<div class="row" padding="10px 20px 10px 200px">
 <div class="col-md-12">
  <br />
  <h3 align="center">Shelf Life Testing</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('shelflifetests.create')}}" class="btn btn-primary">Add Shelf Life Test</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Site</th>
    <th>Testing Date</th>
    <th>Day of Testing</th>
    <th>Date Harvested</th>
    <th>Product type</th>
    <th>Color</th>
    <th>Color Rank</th>
    <th>BRIX</th>
    <th>Firmness</th>
    <th>Firmness Rank</th>
    <th>Smell Rank</th>
    <th>Weight</th>
    <th>Weight Rank</th>
    <th>Height</th>
    <th>Width</th>
    <th>Vine Quality</th>
    <th>Presence of Spots</th>
    <th>Presence of Wrinkles</th>
    <th>Presence of Fungus</th>
    <th>Quality Rank</th>
    <th>Remarks</th>
    <th>Image</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($shelflifetests as $row)
   <tr>
    <td>{{$row['site_name']}}</td>
    <td>{{$row['testing_date']}}</td>
    <td>{{$row['day_of_testing']}}</td>
    <td>{{$row['date_harvested']}}</td>
    <td>{{$row['product_type']}}</td>
    <td>{{$row['color']}}</td>
    <td>{{$row['color_rank']}}</td>
    <td>{{$row['BRIX']}}</td>
    <td>{{$row['firmness']}}</td>
    <td>{{$row['firmness_rank']}}</td>
    <td>{{$row['smell_rank']}}</td>
    <td>{{$row['weight']}}</td>
    <td>{{$row['weight_rank']}}</td>
    <td>{{$row['height']}}</td>
    <td>{{$row['width']}}</td>
    <td>{{$row['vine_quality']}}</td>
    <td>{{$row['spots']}}</td>
    <td>{{$row['wrinkles']}}</td>
    <td>{{$row['fungus']}}</td>
    <td>{{$row['quality_rank']}}</td>
    <td>{{$row['remarks']}}</td>
    <td><img src="{{ asset('uploads/shelflifetesting/' . $row['image']) }}" width="100px;" height="100px;" alt="No Image"></td>
     
    <td><a href="{{action('ShelfLifeTestController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td>
    <form method="post" class="delete_form" action="{{action('ShelfLifeTestController@destroy', $row['id'])}}">
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
