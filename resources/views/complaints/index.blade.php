
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
  <h3 align="center">Complaints Data</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('complaints.create')}}" class="btn btn-primary">Add Complaint</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Location</th>
    <th>Date</th>
    <th>Customer Name</th>
    <th>Complaint Category 1</th>
    <th>Complaint Category 2</th>
    <th>Additional Details</th>
    <th>Batch Code</th>
    <th>Product Type</th>
    <th>Product Details</th>
    <th>Class</th>
    <th>Quantity Returned</th>
    <th>Financial Impact</th>
    <th>RCA</th>
    <th>Internal Resolution</th>
    <th> Customer Resolution</th>
    <th>Image</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($complaints as $row)
   <tr>
    <td>{{$row['site_name']}}</td>
    <td>{{$row['date_received']}}</td>
    <td>{{$row['customer_name']}}</td>
    <td>{{$row['complaint_category_1']}}</td>
    <td>{{$row['complaint_category_2']}}</td>
    <td>{{$row['complaint_sub_category']}}</td>
    <td>{{$row['batch_code']}}</td>
    <td>{{$row['product_type']}}</td>
    <td>{{$row['product_type_2']}}</td>
    <td>{{$row['class']}}</td>
    <td>{{$row['quantity_returned']}}</td>
    <td>{{$row['fin_impact']}}</td>
    <td>{{$row['RCA']}}</td>
    <td>{{$row['internal_resolution']}}</td>
    <td>{{$row['customer_resolution']}}</td>
    <td><img src="{{ asset('uploads/complaints/' . $row['image']) }}" width="100px;" height="100px;" alt="No Image"></td>
    <td><a href="{{action('ComplaintsController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    
    <td>
     <form method="post" class="delete_form" action="{{action('ComplaintsController@destroy', $row['id'])}}">
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