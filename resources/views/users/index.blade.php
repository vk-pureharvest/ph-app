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
      padding-left: 80px;
      }
   </style>
   @endsection
   @section('content')
   <div class="row" padding="10px 20px 10px 200px">
      <div class="col-md-12">
         <br />
         <h3 align="center">Users</h3>
         <br />
         @if($message = Session::get('success'))
         <div class="alert alert-success">
            <p>{{$message}}</p>
         </div>
         @endif
         <div align="right">
            <a href="{{route('users.create')}}" class="btn btn-primary">Create User</a>
            <br />
            <br />
         </div>
         <table class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                <td><a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary">Edit</a></td>
                <td>
                  <form method="post" class="delete_form" action="{{ route('users.destroy',$user->id) }}">
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