
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
  <h3>Edit Reject Data</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('VisualCheckController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$visualchecks->site_name}}" selected="selected">{{$visualchecks->site_name}}</option>
        <option value="Nahel">{{"Nahel"}}</option>    
        <option value="KSA">{{"KSA"}}</option>
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Date Added</label>
      <input class="form-control w-25"  type="date" name="date_added" class="form-control" id="dob" value="{{$visualchecks->date_added}}"/>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Product Type</label>
      <select class="form-control w-25" id="selectCategory" name="product_type" required focus>
      <option value="{{$visualchecks->product_type}}" selected="selected">{{$visualchecks->product_type}}</option>
          
      <option value="Red Candy">Red Candy</option>
      <option value="Pink Candy">Pink Candy</option>
      <option value="Brown Candy">Brown Candy</option>
      <option value="Green Candy">Green Candy</option>
      <option value="Yellow Candy">Yellow Candy</option>
      <option value="Orange Candy">Orange Candy</option>
      <option value="Cocktail">Cocktail</option>
      <option value="Red COV">Red COV</option>
      <option value="Yellow COV">Yellow COV</option>
      <option value="Heirloom">Heirloom</option>
      <option value="Kale">Kale</option>
      <option value="Mixed Candy">Mixed Candy</option>
      <option value="Orange TOV">Orange TOV</option>
      <option value="Plum">Plum</option>
      <option value="Round">Round</option>
      <option value="Strabena">Strabena</option>
      <option value="TOV">TOV</option>
      <option value="Yellow TOV">Yellow TOV</option>
      <option value="Yoom">Yoom</option>
      <option value="Strawberry - Albion">Strawberry - Albion</option>  
      <option value="Strawberry - Aurora Karima">Strawberry - Aurora Karima</option>
      <option value="Strawberry - Bravura">Strawberry - Bravura</option>
      <option value="Strawberry - Carbillo">Strawberry - Carbillo</option>
      <option value="Strawberry - Furore">Strawberry - Furore</option>
      <option value="Strawberry - Murano">Strawberry - Murano</option>
      <option value="Strawberry - San Andreas">Strawberry - San Andreas</option>
      <option value="Sweet Pointed Chili Pepper">Sweet Pointed Chili Pepper</option>
      <option value="Red Lettuce">Red Lettuce</option>
      <option value="Green Lettuce">Green Lettuce</option>
      <option value="Baby Spinach">Baby Spinach</option>
      <option value="Rucola">Rucola</option>
      <option value="Mix Salad">Mix Salad</option>
      <option value="Green Tatsoi">Green Tatsoi</option>
      <option value="Microgreens">Microgreens</option>
      <option value="Nebola">Nebola</option>
      <option value="Other">Other</option>
      </select>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Sample</label>
      <select class="form-control w-25" id="selectCategory" name="sample" required focus>
      <option value="{{$visualchecks->sample}}" selected="selected">{{$visualchecks->sample}}</option>   
      <option value="1">1</option>  
              <option value="2">2</option> 
              <option value="3">3</option> 
              <option value="4">4</option> 
              <option value="5">5</option>
      </select>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Correct quantity as per invoice</label>
      <select class="form-control w-25" id="selectCategory" name="quality" required focus>
      <option value="{{$visualchecks->quality}}" selected="selected">{{$visualchecks->quality}}</option>   
  
      <option value="Yes">Yes</option>  
              <option value="No">No</option>
      </select>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Correct order variety</label>
      <select class="form-control w-25" id="selectCategory" name="order_variety" required focus>
      <option value="{{$visualchecks->order_variety}}" selected="selected">{{$visualchecks->order_variety}}</option>   
      <option value="Yes">Yes</option>  
              <option value="No">No</option>
      </select>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Good appearance</label>
      <select class="form-control w-25" id="selectCategory" name="appearance" required focus>
      <option value="{{$visualchecks->appearance}}" selected="selected">{{$visualchecks->appearance}}</option>   
      <option value="Yes">Yes</option>  
              <option value="No">No</option>
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Correct batch code and expiry/production date</label>
      <select class="form-control w-25" id="selectCategory" name="batch" required focus>
      <option value="{{$visualchecks->batch}}" selected="selected">{{$visualchecks->batch}}</option>   
      <option value="Yes">Yes</option>  
              <option value="No">No</option>
      </select>
  </div>
  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Correct sticker placement</label>
      <select class="form-control w-25" id="selectCategory" name="sticker" required focus>
      <option value="{{$visualchecks->sticker}}" selected="selected">{{$visualchecks->sticker}}</option>   
      <option value="Yes">Yes</option>  
              <option value="No">No</option>
      </select>
  </div>  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Correct weight</label>
      <select class="form-control w-25" id="selectCategory" name="weight" required focus>
      <option value="{{$visualchecks->weight}}" selected="selected">{{$visualchecks->weight}}</option>   
      <option value="Yes">Yes</option>  
              <option value="No">No</option>
      </select>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Correct packaging</label>
      <select class="form-control w-25" id="selectCategory" name="packaging" required focus>
      <option value="{{$visualchecks->packaging}}" selected="selected">{{$visualchecks->packaging}}</option>   
      <option value="Yes">Yes</option>  
              <option value="No">No</option>
      </select>
  </div>


   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection