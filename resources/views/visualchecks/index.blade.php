
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
  <h3 align="center">Add Visual Checks</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('visualchecks.create')}}" class="btn btn-primary">Add new checks</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Site</th>
    <th>Date</th>
    <th>Product Type</th>
    <th>Sample</th>
    <th>Correct quantity as per invoice</th>
    <th>Correct order variety</th>
    <th>Good appearance</th>
    <th>Correct batch code and expiry/production date</th>
    <th>Correct sticker placement</th>
    <th>Correct weight</th>
    <th>Correct packaging</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr> 
   @foreach($visualchecks as $row)
   <tr>
    <td>{{$row['site_name']}}</td>
    <td>{{$row['date_added']}}</td>
    <td>{{$row['product_type']}}</td>
    <td>{{$row['sample']}}</td>
    <td>{{$row['quality']}}</td>
    <td>{{$row['order_variety']}}</td>
    <td>{{$row['weight']}}</td>
    <td>{{$row['appearance']}}</td>
    <td>{{$row['batch']}}</td>
    <td>{{$row['weight']}}</td>
    <td>{{$row['packaging']}}</td>
    <td><a href="{{action('VisualCheckController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td>
     <form method="post" class="delete_form" action="{{action('VisualCheckController@destroy', $row['id'])}}">
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
