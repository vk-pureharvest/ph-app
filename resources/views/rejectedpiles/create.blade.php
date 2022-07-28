
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
  

  <form method="post" action="{{url('rejectedpiles')}}">
   {{csrf_field()}}
   
   <div><H4 >  Add OT Requests </H4></div>

   <div align="middle">
   <a href="{{route('rejectedpiles.index')}}" class="btn btn-primary">View Reject Data</a>
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

  <br />
  <div class="form-group row">
  <table class="table">
    <thead>
      <tr>
        <th>Check Type</th>
        <th>Product Type</th>
        <th>Weight (KGs)</th>
        <th>Remarks</th>
        <th><a href="javascript:;" type="button" class="btn btn-primary addRow" >+</a> </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        
      <td><select type="text" name="check_type[]" class="form-control" placeholder="Enter Check type" required focus>
      <option value="" disabled selected>Select Check type</option>          
        <option value="Color Issue">Color Issue</option>
        <option value="Size/Shape Issue">Size/Shape Issue</option>
        <option value="Spots">Spots</option>
        <option value="Cracks">Cracks</option>
        <option value="Wrinkles">Wrinkles</option>
        <option value="Softness">Softness</option>
        <option value="Good Quality tomatoes">Good Quality tomatoes</option>
      </td>
      <td><select type="text" name="product_type[]" class="form-control" placeholder="Enter Product" required focus>
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
      </td>
      
      <td><input type="decimal" name="weight[]" class="form-control" placeholder="Enter KGs" /></td>
      <td><input class="form-control" type="text" name="comment[]" class="form-control"  placeholder="Addln Comments"/></td>
  
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
    '<td><select type="text" name="check_type[]" class="form-control" placeholder="Enter Check type" required focus>'+
      '<option value="" disabled selected>Select Check type</option>       '+ 
        '<option value="Color Issue">Color Issue</option>'+
        '<option value="Size/Shape Issue">Size/Shape Issue</option>'+
        '<option value="Spots">Spots</option>'+
        '<option value="Cracks">Cracks</option>'+
        '<option value="Wrinkles">Wrinkles</option>'+
        '<option value="Softness">Softness</option>'+
        '<option value="Good Quality tomatoes">Good Quality tomatoes</option>'+
      '</td>'+
      '<td><select type="text" name="product_type[]" class="form-control" placeholder="Enter Product" required focus>'+
      '<option value="" disabled selected>Select Product</option>     '+
    '<option value="Red Candy">Red Candy</option>'+
    '<option value="Pink Candy">Pink Candy</option>'+
    '<option value="Brown Candy">Brown Candy</option>'+
    '<option value="Green Candy">Green Candy</option>'+
    '<option value="Yellow Candy">Yellow Candy</option>'+
    '<option value="Orange Candy">Orange Candy</option>'+
    '<option value="Cocktail">Cocktail</option>'+
    '<option value="Red COV">Red COV</option>'+
    '<option value="Yellow COV">Yellow COV</option>'+
    '<option value="Heirloom">Heirloom</option>'+
    '<option value="Kale">Kale</option>'+
    '<option value="Mixed Candy">Mixed Candy</option>'+
    '<option value="Orange TOV">Orange TOV</option>'+
    '<option value="Plum">Plum</option>'+
    '<option value="Round">Round</option>'+
    '<option value="Strabena">Strabena</option>'+
    '<option value="TOV">TOV</option>'+
    '<option value="Yellow TOV">Yellow TOV</option>'+
    '<option value="Yoom">Yoom</option>'+
    '<option value="Strawberry - Albion">Strawberry - Albion</option>  '+
    '<option value="Strawberry - Aurora Karima">Strawberry - Aurora Karima</option>'+
    '<option value="Strawberry - Bravura">Strawberry - Bravura</option>'+
    '<option value="Strawberry - Carbillo">Strawberry - Carbillo</option>'+
    '<option value="Strawberry - Furore">Strawberry - Furore</option>'+
    '<option value="Strawberry - Murano">Strawberry - Murano</option>'+
    '<option value="Strawberry - San Andreas">Strawberry - San Andreas</option>'+
    '<option value="Sweet Pointed Chili Pepper">Sweet Pointed Chili Pepper</option>'+
    '<option value="Red Lettuce">Red Lettuce</option>'+
    '<option value="Green Lettuce">Green Lettuce</option>'+
    '<option value="Baby Spinach">Baby Spinach</option>'+
    '<option value="Rucola">Rucola</option>'+
    '<option value="Mix Salad">Mix Salad</option>'+
    '<option value="Green Tatsoi">Green Tatsoi</option>'+
    '<option value="Microgreens">Microgreens</option>'+
    '<option value="Nebola">Nebola</option>'+
    '<option value="Other">Other</option>'+
      '</td>'+
      '<td><input type="decimal" name="weight[]" class="form-control" placeholder="Enter KGs" /></td>'+
      '<td><input class="form-control" type="text" name="comment[]" class="form-control"  placeholder="Addln Comments"/></td>'+  
      '<td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>'+
      '</tr>';

        $('tbody').append(tr);
});

$('tbody').on('click', '.deleteRow', function(){
    $(this).parent().parent().remove();
});

</script>
@endsection
