
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
  

  <form method="post" action="{{url('shelflifeberry')}}">
   {{csrf_field()}}
   
   <div><H4 >  Add Shelf Life Testing for Strawberries</H4></div>

   <div align="middle">
   <a href="{{route('shelflifeberry.index')}}" class="btn btn-primary">View Shelf Life Testing Strawberry</a>
   <br />
   <br />
   <br />
  </div>

<div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
        <option value="Nahel" selected>Nahel</option>              
        <option value="Oasis">{{"Oasis"}}</option> 
      </select>
  </div>
  <?php
  date_default_timezone_set('Asia/Dubai');
  ?>
  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Date of Testing</label>
    <input class="form-control w-25" type="date" name="testing_date" value="<?php echo date('Y-m-d'); ?>"/>
  </div>

  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Date of Harvest</label>
    <input class="form-control w-25" type="date" name="harvest_date" class="form-control" id="dob"  placeholder="Date of Harvest"/>
  </div>
  <br />

  <div class="form-group row">
  <table class="table">
    <thead>
      <tr>
        <th>Product Type</th>
        <th>Days Old</th>
        <th>Good ones</th>
        <th>Bad ones</th>
        <th>Remarks</th>
        <th><a href="javascript:;" type="button" class="btn btn-primary addRow" >+</a> </th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="" disabled selected>Product Type</option>        
        <option value="Strawberry - Albion">Strawberry - Albion</option>  
        <option value="Strawberry - Aurora Karima">Strawberry - Aurora Karima</option>
        <option value="Strawberry - Bravura">Strawberry - Bravura</option>
        <option value="Strawberry - Carbillo">Strawberry - Carbillo</option>
        <option value="Strawberry - Furore">Strawberry - Furore</option>
        <option value="Strawberry - Murano">Strawberry - Murano</option>
        <option value="Strawberry - San Andreas">Strawberry - San Andreas</option>
        </select>  
        </td>
        <td><input type="decimal" name="days_old[]" class="form-control" placeholder="Enter Days" /></td>
        <td><input type="decimal" name="good[]" class="form-control" placeholder="Number of good ones" /></td>
        <td><input type="decimal" name="bad[]" class="form-control" placeholder="Number of bad ones" /></td>
        <td><textarea  class="form-control" white-space="pre-wrap" type="text"  name="remarks[]" placeholder="Remarks" rows="1" ></textarea></td>
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
        '<option value="" disabled selected>Product Type</option>          '+
        '<option value="Strawberry - Albion">Strawberry - Albion</option>  '+
        '<option value="Strawberry - Aurora Karima">Strawberry - Aurora Karima</option>'+
        '<option value="Strawberry - Bravura">Strawberry - Bravura</option>'+
        '<option value="Strawberry - Carbillo">Strawberry - Carbillo</option>'+
        '<option value="Strawberry - Furore">Strawberry - Furore</option>'+
        '<option value="Strawberry - Murano">Strawberry - Murano</option>'+
        '<option value="Strawberry - San Andreas">Strawberry - San Andreas</option>'+
        '</select>  '+
        '</td>'+
        '<td><input type="decimal" name="days_old[]" class="form-control" placeholder="Enter Days" /></td>'+
        '<td><input type="decimal" name="good[]" class="form-control" placeholder="Number of good ones" /></td>'+
        '<td><input type="decimal" name="bad[]" class="form-control" placeholder="Number of bad ones" /></td>'+
        '<td><textarea  class="form-control" white-space="pre-wrap" type="text"  name="remarks[]" placeholder="Remarks" rows="1" ></textarea></td>'+
        '<td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>'+
      '</tr>';

        $('tbody').append(tr);
});

$('tbody').on('click', '.deleteRow', function(){
    $(this).parent().parent().remove();
});

</script>
@endsection
