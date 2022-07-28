
@extends('layouts.app')


@section('header')
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <!-- new additions -->

</head>
<style>
div {
  padding-right: 10px;
  padding-left: 30px;
}
</style>
@endsection

@section('content')

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

<div class="row">
 <div class="col-md-12">
  @if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif
  

  <form method="post" action="{{url('batchvisuals')}}">
   {{csrf_field()}}
   
   <div><H4 >  Add Visual Inspection Data </H4></div>

   <div align="middle">
   <a href="{{route('batchvisuals.index')}}" class="btn btn-primary">View Inspection Data</a>
   <br />
   <br />
   <br />
  </div>

<div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>     
        <option value="KSA">{{"KSA"}}</option>
      </select>
  </div>

  <?php
  date_default_timezone_set('Asia/Dubai');
  ?>
  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Date</label>
    <input class="form-control w-25" type="date" name="date_added" value="<?php echo date('Y-m-d'); ?>"/>
  </div>

  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="product_type" required focus>
      <option value="" disabled selected>Select Product</option>   
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
  <br />
  <div class="form-group row">
  <table class="table">
    <thead>
      <tr>
        <th>Sample</th>
        <th>Packing Quality</th>
        <th>Packaging specs (batch code, expiry date etc)</th>

        <th><a href="javascript:;" type="button" class="btn btn-primary addRow" >+</a> </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        
      <td><select class="form-control w-100" id="selectCategory" name="sample[]" required focus>
      <option value="" disabled selected>Sample</option>   
              <option value="1">1</option>  
              <option value="2">2</option> 
              <option value="3">3</option> 
              <option value="4">4</option> 
              <option value="5">5</option>
      </td>
      <td><select class="form-control w-100" id="selectCategory" name="batch_code[]" required focus>
      <option value="" disabled selected>Select Yes/No</option>   
              <option value="Yes">Yes</option>  
              <option value="No">No</option>
      </td>
      <td><select class="form-control w-100" id="selectCategory" name="expiry_date[]" required focus>
      <option value="" disabled selected>Select Yes/No</option>   
              <option value="Yes">Yes</option>  
              <option value="No">No</option>
      </td>
        <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
      </tr>
     </tbody>
  </table>
</div>
<br />
<div class="form-group w-25">
    <input style="position: relative; left: 250px" type="submit" value="Submit" class="btn btn-primary" />
    </form>
   </div>

    
  </form>
</div>
</div>
  <script>
$('thead').on('click', '.addRow', function(){
    var tr='<tr>'+
      '</td>'+
      '<td><select class="form-control w-100" id="selectCategory" name="sample[]" required focus>'+
      '<option value="" disabled selected>Sample</option>   '+
              '<option value="1">1</option>  '+
              '<option value="2">2</option> '+
              '<option value="3">3</option> '+
              '<option value="4">4</option> '+
              '<option value="5">5</option>'+
      '</td>'+
      '<td><select class="form-control w-100" id="selectCategory" name="batch_code[]" required focus>'+
      '<option value="" disabled selected>Select Yes/No</option>   '+
              '<option value="Yes">Yes</option>  '+
              '<option value="No">No</option>'+
      '</td>'+
      '<td><select class="form-control w-100" id="selectCategory" name="expiry_date[]" required focus>'+
      '<option value="" disabled selected>Select Yes/No</option>   '+
              '<option value="Yes">Yes</option>  '+
              '<option value="No">No</option>'+
      '</td>'+
      '<td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>'+
      '</tr>';

        $('tbody').append(tr);
});

$('tbody').on('click', '.deleteRow', function(){
    $(this).parent().parent().remove();
});

</script>
@endsection
