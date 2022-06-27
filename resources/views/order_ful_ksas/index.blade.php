
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
  <h3 align="center">Order fulfillment details</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('order_ful_ksas.create')}}" class="btn btn-primary">Add Order Fulfillment Details</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
   <th>Site Name</th>
    <th>Date</th> 
    <th>Product Type</th>
        <th>Ordered Quantity (KG)</th>
        <th>Delivered Quantity (KG)</th>
        <th>Forecasted Quantity (KG)</th>
        <th>Harvested Quantity (KG)</th> 
        <th>Remarks</th> 
    <th>Delete</th>
   </tr>
   @foreach($order_ful_ksas as $row)
   <tr>
    <td>{{$row['site_name']}}</td>
    <td>{{$row['date_added']}}</td>
    <td>{{$row['product_type']}}</td>
    <td>{{$row['ordered_kg']}}</td>
    <td>{{$row['delivered_kg']}}</td>
    <td>{{$row['forecast_kg']}}</td>
    <td>{{$row['harvest_kg']}}</td>
    <td>{{$row['comment']}}</td>
    <td>
     <form method="post" class="delete_form" action="{{action('Order_Full_KSA_Controller@destroy', $row['id'])}}">
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
