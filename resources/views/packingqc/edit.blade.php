
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
  <h3>Edit Packing Quality Check data</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('PackingQCController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$packingqcs->site_name}}" selected="selected">{{$packingqcs->site_name}}</option>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Date Added</label>
      <input class="form-control w-25"  type="date" name="date_added" class="form-control" id="dob" value="{{$packingqcs->date_added}}"/>
  </div>
   
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Product Type</label>
    <select class="form-control w-25" id="selectProduct" name="product_type" required focus>
                <option value="{{$packingqcs->product_type}}" selected="selected">{{$packingqcs->product_type}}</option>  
                <option value="Plum 5kg">Plum 5kg</option>
                <option value="Round 5kg">Round 5kg</option>
                <option value="TOV">TOV</option>
                <option value="TOV - Yellow">TOV - Yellow</option>
                <option value="TOV - Orange">TOV - Orange</option>
                <option value="TOV Pink">TOV Pink</option>
                <option value="TOV Green">TOV Green</option>
                <option value="Heirloom">Heirloom</option>
                <option value="COV">COV</option>
                <option value="COV Yellow">COV Yellow</option>
                <option value="Strabena">Strabena</option>
                <option value="Yoom">Yoom</option>
                <option value="Cocktail">Cocktail</option>
                <option value="Candy Cup">Candy Cup</option>
                <option value="Candy 350gm kft">Candy 350gm kft</option>
                <option value="Candy Shaker ">Candy Shaker </option>
                <option value="Candy Mixed Shaker ">Candy Mixed Shaker </option>
                <option value="Candy Mixed">Candy Mixed</option>
                <option value="Candy (loose)">Candy (loose)</option>
                <option value="COV (loose)">COV (loose)</option>
                <option value="Cocktail (loose)">Cocktail (loose)</option>
                <option value="Strabena (loose)">Strabena (loose)</option>
                <option value="Mixed candy (loose)">Mixed candy (loose)</option>
                <option value="COV Yellow (Loose)">COV Yellow (Loose)</option>
                <option value="COV Orange(Loose)">COV Orange(Loose)</option>
                <option value="SF COV">SF COV</option>
                <option value="FF COV">FF COV</option>
                <option value="SF Candy">SF Candy</option>
                <option value="FF Candy">FF Candy</option>
                <option value="Strawberry - Albion">Strawberry - Albion</option>  
                <option value="Strawberry - Aurora Karima">Strawberry - Aurora Karima</option>
                <option value="Strawberry - Bravura">Strawberry - Bravura</option>
                <option value="Strawberry - Carbillo">Strawberry - Carbillo</option>
                <option value="Strawberry - Furore">Strawberry - Furore</option>
                <option value="Strawberry - Murano">Strawberry - Murano</option>
                <option value="Strawberry - San Andreas">Strawberry - San Andreas</option>
                <option value="Other">None</option>
            </select>

   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Total Kg</label>
    <input class="form-control w-25" type="decimal" name="total_kg" class="form-control" value="{{$packingqcs->total_kg}}" placeholder="Enter Kg" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Damange Reason</label>
    <textarea type="text" name="damage_reason" class="form-control w-25" value="{{$packingqcs->damage_reason}}" cols="100" rows="1"/>{{$packingqcs->damage_reason}}</textarea>  
  </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Percentage</label>
    <input class="form-control w-25" type="decimal" name="perc" class="form-control" value="{{$packingqcs->perc}}" placeholder="Enter Reason" />
   </div>

   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection