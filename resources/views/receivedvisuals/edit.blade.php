
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
  <form method="post" action="{{action('ReceivedTomatoesController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$receivedvisuals->site_name}}" selected="selected">{{$receivedvisuals->site_name}}</option>
        <option value="Nahel">{{"Nahel"}}</option>    
        <option value="KSA">{{"KSA"}}</option>
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Date Added</label>
      <input class="form-control w-25"  type="date" name="date_added" class="form-control" id="dob" value="{{$receivedvisuals->date_added}}"/>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Product Type</label>
      <select class="form-control w-25" id="selectCategory" name="product_type" required focus>
      <option value="{{$receivedvisuals->product_type}}" selected="selected">{{$receivedvisuals->product_type}}</option>
          
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
      <option value="{{$receivedvisuals->sample}}" selected="selected">{{$receivedvisuals->sample}}</option>   
      <option value="1">1</option>  
              <option value="2">2</option> 
              <option value="3">3</option> 
              <option value="4">4</option> 
              <option value="5">5</option>
      </select>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Color</label>
      <select class="form-control w-25" id="selectCategory" name="color" required focus>
      <option value="{{$receivedvisuals->color}}" selected="selected">{{$receivedvisuals->color}}</option>   
      <option value="Yes">Yes</option>  
              <option value="No">No</option>
      </select>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Size</label>
      <select class="form-control w-25" id="selectCategory" name="size" required focus>
      <option value="{{$receivedvisuals->size}}" selected="selected">{{$receivedvisuals->size}}</option>   
      <option value="Yes">Yes</option>  
              <option value="No">No</option>
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Spots</label>
      <select class="form-control w-25" id="selectCategory" name="spots" required focus>
      <option value="{{$receivedvisuals->spots}}" selected="selected">{{$receivedvisuals->spots}}</option>   
      <option value="Yes">Yes</option>  
              <option value="No">No</option>
      </select>
  </div>
  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Fungus</label>
      <select class="form-control w-25" id="selectCategory" name="fungus" required focus>
      <option value="{{$receivedvisuals->fungus}}" selected="selected">{{$receivedvisuals->fungus}}</option>   
      <option value="Yes">Yes</option>  
              <option value="No">No</option>
      </select>
  </div>  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Wrinkles</label>
      <select class="form-control w-25" id="selectCategory" name="wrinkles" required focus>
      <option value="{{$receivedvisuals->wrinkles}}" selected="selected">{{$receivedvisuals->wrinkles}}</option>   
      <option value="Yes">Yes</option>  
              <option value="No">No</option>
      </select>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Softness</label>
      <select class="form-control w-25" id="selectCategory" name="softness" required focus>
      <option value="{{$receivedvisuals->softness}}" selected="selected">{{$receivedvisuals->softness}}</option>   
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