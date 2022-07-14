
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
  <h3 align="center">Quality Check Data</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('p_o_requests.create')}}" class="btn btn-primary">Add PO Requests</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Requestor</th>
    <th>Supplier</th>
    <th>Description</th>
    <th>Request Date</th>
    <th>Account</th>
    <th>Amount</th> 
    <th>Terms</th> 
    <th>Comments</th>  
    <th>Files</th>  
   </tr>
   @foreach($p_o_requests as $row)
   <tr>
    <td>{{$row['requestor']}}</td>
    <td>{{$row['supplier']}}</td>
    <td>{{$row['description']}}</td>
    <td>{{$row['request_date']}}</td>
    <td>{{$row['account']}}</td>
    <td>{{$row['amount']}}</td>
    <td>{{$row['terms']}}</td>
    <td>{{$row['comments']}}</td>
    <td>
    @foreach($p_o_request_files as $file)
    @if ($image['porequest_id']==$row['id'])
    <img src="{{ asset('uploads/p_o_request/' . $file['file']) }}" width="100px;" height="100px;" alt="No Files">
    @endif
    @endforeach
    </td>
    <td>
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