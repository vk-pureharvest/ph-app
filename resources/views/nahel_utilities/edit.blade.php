
@extends('layouts.app')

@section('header')

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel1') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
     
<style>
div {
  padding-right: 30px;
  padding-left: 30px;
}
</style>
</head>

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
  @endif
  <form method="post" action="{{action('NahelUtilityController@update', $id)}}">
   {{csrf_field()}}
   

   <input type="hidden" name="_method" value="PATCH" />
   
  <br />
  <h3>Edit Utitlies Readings</h3>
  <br />

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
    <select class="form-control w-25" id="site" name="site_name" required focus>
    <option value="{{$nahel_utilities->site_name}}" selected="selected">{{$nahel_utilities->site_name}}</option>    
    <option value="Nahel">{{"Nahel"}}</option>
  </select>
  </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Date Added</label>
    <input class="form-control w-25" type="date" name="date_added" class="form-control" id="dob" value="{{$nahel_utilities->date_added}}" placeholder="Enter Date" />
   </div>     
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Electra  </label>
    <input type="decimal" name="electra_1" class="form-control w-25" placeholder="Enter Value" value="{{$nahel_utilities->electra_1}}"/>
  </div>       
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Electra 2</label>
    <input type="decimal" name="electra_2" class="form-control w-25" placeholder="Enter Value" value="{{$nahel_utilities->electra_2}}"/>
  </div>
  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Reject Water</label>
    <input type="decimal" name="reject_water" class="form-control w-25"  placeholder="Enter Value" value="{{$nahel_utilities->reject_water}}"/>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Supply Water Corridor 1</label>
    <input type="decimal" name="supply_water_1" class="form-control w-25"  placeholder="Enter Value"value="{{$nahel_utilities->supply_water_1}}"/>
  </div>
  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Supply Water Corridor 2</label>
    <input type="decimal" name="supply_water_2" class="form-control w-25"  placeholder="Enter Value" value="{{$nahel_utilities->supply_water_2}}"/>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Irrigation Water</label>
    <input type="decimal" name="irrigation_water" class="form-control w-25"  placeholder="Enter Value" value="{{$nahel_utilities->irrigation_water}}"/>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Ground Water</label>
    <input type="decimal" name="ground_water" class="form-control w-25"  placeholder="Enter Value" value="{{$nahel_utilities->ground_water}}"/>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">EC Padwall Water</label>
    <input type="decimal" name="ec_padwall_water" class="form-control w-25"  placeholder="Enter Value" value="{{$nahel_utilities->ec_padwall_water}}"/>
  </div>
  <br />
   <div class="form-group">
    <input style="position: relative; left: 250px"  type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection