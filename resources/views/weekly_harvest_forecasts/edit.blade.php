
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
  <h3>Edit Weekly Harvest data</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('WeeklyHarvestController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
 
   
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Week #</label>
      <input class="form-control w-25"  type="integer" name="week_num" class="form-control" value="{{$weekly_harvest_forecasts->week_num}}"/>
  </div>
  
   
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Year</label>
      <input class="form-control w-25"  type="integer" name="year" class="form-control" value="{{$weekly_harvest_forecasts->year}}"/>
  </div>

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Crop Variety</label>
    <select class="form-control w-25" id="selectProduct" name="product_type" required focus>
                <option value="{{$weekly_harvest_forecasts->product_type}}" selected="selected">{{$weekly_harvest_forecasts->product_type}}</option>  
                <option value='Cocktail'>Cocktail</option>
                <option value='Yoom'>Yoom</option>
                <option value='Heirloom'>Heirloom</option>
                <option value='Orange TOV'>Orange TOV</option>
                <option value='Yellow TOV'>Yellow TOV</option>
                <option value='Strabena'>Strabena</option>
                <option value='Plum'>Plum</option>
                <option value='Mixed Candy'>Mixed Candy</option>
                <option value='Candy'>Candy</option>
                <option value='COV'>COV</option>
                <option value='TOV'>TOV</option>
                <option value='Round'>Round</option>

            </select>

   </div>
   
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">KGs Harvested</label>
      <input class="form-control w-25"  type="decimal" name="kgs_harvested" class="form-control" value="{{$weekly_harvest_forecasts->kgs_harvested}}"/>
  </div>
   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection