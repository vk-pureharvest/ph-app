
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
    <label class="col-sm-2 col-form-label">Boxes Weight in Grams</label>
    <select class="form-control w-25" name="box_weight" required focus>
                <option value="{{$leafy_green_package->box_weight}}" selected="selected">{{$leafy_green_package->box_weight}}</option>  
                <option value="100">100</option>
                <option value="125">125</option>
            </select>
   </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Product Type</label>
    <select class="form-control w-25" id="selectProduct" name="product_type" required focus>
                <option value="{{$leafy_green_package->product_type}}" selected="selected">{{$leafy_green_package->product_type}}</option>  
                <option value="Red Lettuce">Red Lettuce</option>
                <option value="Green Lettuce">Green Lettuce</option>
                <option value="Baby Spinach">Baby Spinach</option>
                <option value="Rucola">Rucola</option>
            </select>
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Number of Punnets</label>
    <input class="form-control w-25" type="decimal" name="no_of_punnets" class="form-control" value="{{$leafy_green_package->no_of_punnets}}" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Number of boxes</label>
    <input class="form-control w-25" type="decimal" name="no_of_boxes" class="form-control" value="{{$leafy_green_package->no_of_boxes}}" />
   </div>
   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection