
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
  <h3>Edit Strawberry testing data</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('ShelfLifeBerryController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$shelflifeberry->site_name}}" selected="selected">{{$shelflifeberry->site_name}}</option>
        <option value="Nahel" selected>Nahel</option>              
        <option value="Al Ain">{{"Al Ain"}}</option>             
        <option value="Oasis">{{"Oasis"}}</option>  
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Testing Date</label>
      <input class="form-control w-25"  type="date" name="testing_date" class="form-control" id="dob" value="{{$shelflifeberry->testing_date}}"/>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Harvest Date</label>
      <input class="form-control w-25"  type="date" name="harvest_date" class="form-control" id="dob" value="{{$shelflifeberry->harvest_date}}"/>
  </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Product Type</label>
    <select class="form-control w-25" id="selectProduct" name="product_type" required focus>
                <option value="{{$shelflifeberry->product_type}}" selected="selected">{{$shelflifeberry->product_type}}</option>  
                <option value="Strawberry - Albion">Strawberry - Albion</option>  
                <option value="Strawberry - Aurora Karima">Strawberry - Aurora Karima</option>
                <option value="Strawberry - Bravura">Strawberry - Bravura</option>
                <option value="Strawberry - Carbillo">Strawberry - Carbillo</option>
                <option value="Strawberry - Furore">Strawberry - Furore</option>
                <option value="Strawberry - Murano">Strawberry - Murano</option>
                <option value="Strawberry - San Andreas">Strawberry - San Andreas</option>
            </select>

   </div>
   
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Days Old</label>
    <input class="form-control w-25" type="decimal" name="days_old" class="form-control" value="{{$shelflifeberry->days_old}}" placeholder="Enter Days" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Good ones</label>
    <input class="form-control w-25" type="decimal" name="good" class="form-control" value="{{$shelflifeberry->good}}" placeholder="Enter Good" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Bad ones</label>
    <input class="form-control w-25" type="decimal" name="bad" class="form-control" value="{{$shelflifeberry->bad}}" placeholder="Enter Bad" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Remarks</label>
    <textarea type="text" name="remarks" class="form-control w-25" value="{{$shelflifeberry->remarks}}" cols="100" rows="1"/>{{$shelflifeberry->remarks}}</textarea> 
  </div>
   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection