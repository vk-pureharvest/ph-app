
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

<link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true
        });
    } );
    </script>

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
  <h3>Edit OT Hours</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('OvertimeController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$overtimes->site_name}}" selected="selected">{{$overtimes->site_name}}</option>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>    
        <option value="KSA">{{"KSA"}}</option>
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Date Added</label>
      <input class="form-control w-25"  type="date" name="date_added" class="form-control" id="dob" value="{{$overtimes->date_added}}"/>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Employee</label>
    <input class="form-control w-25" type="text" name="employee" class="form-control" value="{{$overtimes->employee}}" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Reason</label>
    <select class="form-control w-25" id="text" name="reason" required focus>
                <option value="{{$overtimes->employee}}" selected="selected">{{$overtimes->reason}}</option>  
                <option value="Excess orders">Excess orders</option>
        <option value="Quality issues">Quality issues</option>
        <option value="Shortage of labour">Shortage of labour</option>
        <option value="Cleaning">Cleaning</option>
        <option value="Admin work">Admin work</option>
        <option value="Others">Others</option>
   </select>
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Hours Requested</label>
    <input class="form-control w-25" type="decimal" name="ot_requested" class="form-control" value="{{$overtimes->ot_requested}}" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Hours Granted</label>
    <input class="form-control w-25" type="decimal" name="ot_granted" class="form-control" value="{{$overtimes->ot_granted}}" />
   </div>  

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Comments</label>
      <input class="form-control w-25"  type="text" name="comment" class="form-control" id="dob" value="{{$overtimes->comment}}"/>
  </div>
   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection