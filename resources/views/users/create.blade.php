@extends('layouts.app')
@section('header')
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <!-- new additions -->
</head>
<style>
   div {
   padding-right: 10px;
   padding-left: 30px;
   }
</style>
@endsection
@section('content')
<div class="row">
   <div class="col-md-12">
      @if(count($errors) > 0)
      <div class="alert alert-danger">
         <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
         </ul>
      </div>
      @endif
      @if(\Session::has('success'))
      <div class="alert alert-success">
         <p>{{ \Session::get('success') }}</p>
      </div>
      @endif
      <form method="post" action="{{ route('users.store') }}">
         {{ csrf_field() }}
         <div>
            <H4>Create User</H4>
         </div>
         <div align="middle">
            <a href="{{ route('users.index') }}" class="btn btn-primary">View Users</a>
            <br />
            <br />
            <br />
         </div>
         <div style="position: relative; left: 50px" class="form-group row">
            <label class="col-sm-2 col-form-label">Name</label>
            <input class="form-control w-25" type="text" name="name" value="{{ old('name') }}" class="form-control" id="name"  placeholder="Enter Name"/>
         </div>
         <div style="position: relative; left: 50px" class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <input class="form-control w-25" type="email" name="email" value="{{ old('email') }}" class="form-control" id="email"  placeholder="Enter Email"/>
         </div>
         <div style="position: relative; left: 50px" class="form-group row">
            <label class="col-sm-2 col-form-label">Password</label>
            <input class="form-control w-25" type="password" name="password" class="form-control" id="password"  placeholder="Enter Password"/>
         </div>
         <div style="position: relative; left: 50px" class="form-group row">
            <label class="col-sm-2 col-form-label">Confirm Password</label>
            <input class="form-control w-25" type="password" name="confirm-password" class="form-control" id="password-confirm"  placeholder="Enter Confirm Password"/>
         </div>
         <br />
         <div class="form-group w-25">
            <input style="position: relative; left: 250px" type="submit" value="Create User" class="btn btn-primary" />
      </form>
      </div>
      </form>
   </div>
</div>
@endsection