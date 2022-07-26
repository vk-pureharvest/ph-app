
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
  <h3 align="center">PO Data</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('po_status.create')}}" class="btn btn-primary">Add PO Requests</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
   <th>Request#</th>
   <th>PO#</th>
   <th>Requestor</th>
    <th>Supplier</th> 
    <th>Request Date</th>
    <th>Account</th>
    <th>Amount</th> 
    <th>Status</th> 
    <th>Payment</th> 
    <th>Terms</th> 
    <th>Comments</th>  
    <th>Files</th>  
    <th>Edit</th>  
   </tr>
   @foreach($p_o_requests as $row)
   <tr>
    <td>{{$row['id']}}</td>
    <td>{{$row['po_number']}}</td>
    <td>{{$row['requestor']}}</td>
    <td>{{$row['supplier']}}</td> 
    <td>{{$row['request_date']}}</td>
    <td>{{$row['account']}}</td>
    <td>{{$row['amount']}}</td>
    <td>{{$row['status']}}</td>
    <td>{{$row['payment']}}</td>
    <td>{{$row['terms']}}</td>
    <td>{{$row['comments']}}</td>
    <td>
    @foreach($p_o_request_files as $file)
    @if ($file['porequest_id']==$row['id'])
    <a href="{{ asset('uploads/p_o_request/' . $file['file']) }}" width="100px;" height="100px;" alt="No Files">File{{ $loop->iteration }}  
    @endif
    @endforeach
    </td> 
    <td><a href="{{action('POStatusController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td> 
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