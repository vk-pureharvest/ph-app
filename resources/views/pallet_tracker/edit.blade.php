
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
  <h3>Edit Pallet details</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('Pallect_trackerController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$pallet_tracker->site_name}}" selected="selected">{{$pallet_tracker->site_name}}</option>
        <option value="Al Ain">Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Date</label>
      <input class="form-control w-25"  type="date" name="date_added" class="form-control" id="dob" value="{{$pallet_tracker->date_added}}"/>
  </div>

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Time</label>
    <input class="form-control w-25" type="time" name="time_added" class="form-control" value="{{$pallet_tracker->time_added}}" placeholder="Enter Date" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Quality check</label>
   <select class="form-control w-25" id="selectCategory" name="quality_check" required focus>
      <option value="{{$pallet_tracker->quality_check}}" selected="selected">{{$pallet_tracker->quality_check}}</option>
        <option value="Yes">Yes</option>        
        <option value="No">No</option>
      </select>
    </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Weight check</label>
   <select class="form-control w-25" id="selectCategory" name="weight_check" required focus>
      <option value="{{$pallet_tracker->weight_check}}" selected="selected">{{$pallet_tracker->weight_check}}</option>
        <option value="Yes">Yes</option>        
        <option value="No">No</option>
      </select>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label">Weight Entered</label>
      <input class="form-control w-25"  type="decimal" name="weight_entered" class="form-control" value="{{$pallet_tracker->weight_entered}}"/>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Used right Packaging Material?</label>
   <select class="form-control w-25" id="selectCategory" name="material_check" required focus>
      <option value="{{$pallet_tracker->material_check}}" selected="selected">{{$pallet_tracker->material_check}}</option>
        <option value="Yes">Yes</option>        
        <option value="No">No</option>
      </select>
    </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Remarks</label>
      <input class="form-control w-25"  type="text" name="remarks" class="form-control" value="{{$pallet_tracker->remarks}}"/>
  </div>
   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection