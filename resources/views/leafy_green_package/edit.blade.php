
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
  <h3>Edit Leafy Greens Packaging data</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('LeafyGreenPackedController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$leafy_green_package->site_name}}" selected="selected">{{$leafy_green_package->site_name}}</option>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Date Added</label>
      <input class="form-control w-25"  type="date" name="date_added" class="form-control" id="dob" value="{{$leafy_green_package->date_added}}"/>
  </div>
  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Product Type</label>
    <select class="form-control w-25" id="selectProduct" name="product_type" required focus>
                <option value="{{$leafy_green_package->product_type}}" selected="selected">{{$leafy_green_package->product_type}}</option>  
                <option value="Red lettuce">Red lettuce</option>
                <option value="Green lettuce">Green lettuce</option>
                <option value="Baby Spinach">Baby Spinach</option>
                <option value="Rucola">Rucola</option>
                <option value="Mixed Salad">Mixed Salad</option>
                <option value="Green Tatsoi">Green Tatsoi</option>
                <option value="Red Totsoi">Red Totsoi</option>
                <option value="Mix Kales">Mix Kales</option>
                <option value="Green kale">Green kale</option>
                <option value="Caltivated Rucola">Caltivated Rucola</option>
                <option value="Sweet Genovess">Sweet Genovess</option>
                <option value="Rubi">Rubi</option>
                <option value="Green Fire">Green Fire</option>
                <option value="Bullas Blood">Bullas Blood</option>
                <option value="Red chard">Red chard</option>
                <option value="wasabina improved">wasabina improved</option>
                <option value="Russian kale">Russian kale</option>
                <option value="Red Russian">Red Russian</option>
                <option value="Red carpet">Red carpet</option>
                <option value="Red drgon">Red drgon</option>
                <option value="kale Scarlet">kale Scarlet</option>
                <option value="Pak choi">Pak choi</option>
                <option value="Gibbard Rz">Gibbard Rz</option>
                <option value="Crunchy Red">Crunchy Red</option>
                <option value="Warhol Rz">Warhol Rz</option>
                <option value="Crystal red lettuce/44CL5001">Crystal red lettuce/44CL5001</option>
                <option value="79-M/8166">79-M/8166</option>
                <option value="Bonarda Rz">Bonarda Rz</option>
                <option value="Frisee Lettuce">Frisee Lettuce</option>
                <option value="Curnchy Green Lettuce/ Exaudio">Curnchy Green Lettuce/ Exaudio</option>
                <option value="Oak leaf">Oak leaf</option>
                <option value="Lob jot">Lob jot</option>
                <option value="Curnchy Red Lettuce/ Binex">Curnchy Red Lettuce/ Binex</option>

            </select>
   </div>
   
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Total Production (KGs)</label>
    <input class="form-control w-25" type="decimal" name="total_prod" class="form-control" value="{{$leafy_green_package->total_prod}}" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Class 1 Production (KGs)</label>
    <input class="form-control w-25" type="decimal" name="class1_prod" class="form-control" value="{{$leafy_green_package->class1_prod}}" />
   </div>
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Number of Lines</label>
    <input class="form-control w-25" type="decimal" name="no_of_lines" class="form-control" value="{{$leafy_green_package->no_of_lines}}" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Number of Gutters</label>
    <input class="form-control w-25" type="decimal" name="no_of_gutters" class="form-control" value="{{$leafy_green_package->no_of_gutters}}" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Comments</label>
      <input class="form-control w-25"  type="text" name="comments" class="form-control" value="{{$leafy_green_package->comments}}"/>
  </div>
   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection