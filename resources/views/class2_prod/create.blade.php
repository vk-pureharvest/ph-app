
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
  

  <form method="post" action="{{url('class2_prod')}}">
   {{csrf_field()}}
   
   <div><H4 >  Add Production by Class </H4></div>

   <div align="middle">
   <a href="{{route('class2_prod.index')}}" class="btn btn-primary">View Production by Class</a>
   <br />
   <br />
   <br />
  </div>

<div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>
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
        <th>Product Type</th>
        <th>Class</th>
        <th>Production (Kg)</th>
        <th><a href="javascript:;" type="button" class="btn btn-primary addRow" >+</a> </th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="" disabled selected>Product Type</option>          
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
        <option value="Strawberry Loose">Strawberry Loose</option>  
        <option value="Strawberry Branded">Strawberry Branded</option>
        <option value="Strawberry Unbranded">Strawberry Unbranded</option>
        <option value="Other">None</option>
        </select>  
        </td>
        <td><select type="text" name="class_type[]" class="form-control" placeholder="Enter Class" required focus>
        <option value="" disabled selected>Select Class</option>          
        <option value="Class 1">Class 1</option>
        <option value="Class 2">Class 2</option>
      </td>
      <td><input type="integer" name="production[]" class="form-control" placeholder="Enter Production in kg" /></td>
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
      '<td>'+
        '<select class="form-control" id="selectProduct" name="product_type[]" required focus>'+
        '<option value="" disabled selected>Product Type</option>'+
        '<option value="Plum 5kg">Plum 5kg</option>'+
        '<option value="Round 5kg">Round 5kg</option>'+
        '<option value="TOV">TOV</option>'+
        '<option value="TOV - Yellow">TOV - Yellow</option>'+
        '<option value="TOV - Orange">TOV - Orange</option>'+
        '<option value="TOV Pink">TOV Pink</option>'+
        '<option value="TOV Green">TOV Green</option>'+
        '<option value="Heirloom">Heirloom</option>'+
        '<option value="COV">COV</option>'+
        '<option value="COV Yellow">COV Yellow</option>'+
        '<option value="Strabena">Strabena</option>'+
        '<option value="Yoom">Yoom</option>'+
        '<option value="Cocktail">Cocktail</option>'+
        '<option value="Candy Cup">Candy Cup</option>'+
        '<option value="Candy 350gm kft">Candy 350gm kft</option>'+
        '<option value="Candy Shaker ">Candy Shaker </option>'+
        '<option value="Candy Mixed Shaker ">Candy Mixed Shaker </option>'+
        '<option value="Candy Mixed">Candy Mixed</option>'+
        '<option value="Candy (loose)">Candy (loose)</option>'+
        '<option value="COV (loose)">COV (loose)</option>'+
        '<option value="Cocktail (loose)">Cocktail (loose)</option>'+
        '<option value="Strabena (loose)">Strabena (loose)</option>'+
        '<option value="Mixed candy (loose)">Mixed candy (loose)</option>'+
        '<option value="COV Yellow (Loose)">COV Yellow (Loose)</option>'+
        '<option value="COV Orange(Loose)">COV Orange(Loose)</option>'+
        '<option value="SF COV">SF COV</option>'+
        '<option value="FF COV">FF COV</option>'+
        '<option value="SF Candy">SF Candy</option>'+
        '<option value="FF Candy">FF Candy</option>'+
        '<option value="Strawberry Loose">Strawberry Loose</option>  '+
        '<option value="Strawberry Branded">Strawberry Branded</option>'+
        '<option value="Strawberry Unbranded">Strawberry Unbranded</option>'+
        '<option value="None">None</option>'+
        '</select>  '+
        '</td>'+
        '<td><select type="text" name="class_type[]" class="form-control" placeholder="Enter Class" required focus>'+
        '<option value="" disabled selected>Select Class</option>    '+      
        '<option value="Class 1">Class 1</option>'+
        '<option value="Class 2">Class 2</option>'+
      '</td>'+
      '<td><input type="integer" name="production[]" class="form-control" placeholder="Enter Production in kg" /></td>'+
      '<td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>'+
      '</tr>';

        $('tbody').append(tr);
});

$('tbody').on('click', '.deleteRow', function(){
    $(this).parent().parent().remove();
});

</script>
@endsection
