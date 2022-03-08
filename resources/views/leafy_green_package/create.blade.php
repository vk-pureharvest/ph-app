
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
  

  <form method="post" action="{{url('leafy_green_package')}}">
   {{csrf_field()}}
   
   <div><H4 >  Leafy Green Packaging Details </H4></div>

   <div align="middle">
   <a href="{{route('leafy_green_package.index')}}" class="btn btn-primary">View Leafy Greens Packed</a>
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
        <th>Product type</th>
        <th>Total Production (KGs)</th>
        <th>Class 1 Production (KGs)</th>
        <th>Number of Lines</th>
        <th>Number of Gutters</th>
        <th>Comments</th>
        <th><a href="javascript:;" type="button" class="btn btn-primary addRow" >+</a> </th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="" disabled selected>Product Type</option>        
        <option value="Red Lettuce">Red Lettuce</option>
        <option value="Green Lettuce">Green Lettuce</option>
        <option value="Baby Spinach">Baby Spinach</option>
        <option value="Rucola">Rucola</option>
        <option value="Green Kale">Green Kale</option>
        <option value="Green Curly Kale">Green Curly Kale</option>
        <option value="Mix Kale">Mix Kale</option>
        <option value="Red Kale">Red Kale</option>
        <option value="Green Tatsoi">Green Tatsoi</option>
        <option value="Red Tatsoi">Red Tatsoi</option>
        <option value="Cabbage">Cabbage</option>
        <option value="Red Russian">Red Russian</option>
        </select>  </td>
      <td><input type="decimal" name="total_prod[]" class="form-control" placeholder="Enter total production" value="0"/></td>
      <td><input type="decimal" name="class1_prod[]" class="form-control" placeholder="Enter class 1 KGs" value="0"/></td>
      <td><input type="decimal" name="no_of_lines[]" class="form-control" placeholder="Enter number of lines" /></td>
      <td><input type="decimal" name="no_of_gutters[]" class="form-control" placeholder="Enter number of gutters" /></td>
      <td><textarea class="form-control" type="text" name="comments[]" cols="50" rows="1" placeholder="Comments"></textarea></td>
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
    '<td> <select class="form-control" id="selectProduct" name="product_type[]" required focus>'+
      ' <option value="" disabled selected>Product Type</option>        '+
       ' <option value="Red Lettuce">Red Lettuce</option>'+
      '  <option value="Green Lettuce">Green Lettuce</option>'+
       ' <option value="Baby Spinach">Baby Spinach</option>'+
        '<option value="Rucola">Rucola</option>'+
        '<option value="Green Kale">Green Kale</option>'+
        '<option value="Green Curly Kale">Green Curly Kale</option>'+
        '<option value="Mix Kale">Mix Kale</option>'+
        '<option value="Red Kale">Red Kale</option>'+
        '<option value="Green Tatsoi">Green Tatsoi</option>'+
        '<option value="Red Tatsoi">Red Tatsoi</option>'+
        '<option value="Cabbage">Cabbage</option>'+
        '<option value="Red Russian">Red Russian</option>'+
        '</select>  </td>'+
      '<td><input type="decimal" name="total_prod[]" class="form-control" placeholder="Enter total production" value="0"/></td>'+
      '<td><input type="decimal" name="class1_prod[]" class="form-control" placeholder="Enter class 1 KGs" value="0"/></td>'+
      '<td><input type="decimal" name="no_of_lines[]" class="form-control" placeholder="Enter number of lines" /></td>'+
      '<td><input type="decimal" name="no_of_gutters[]" class="form-control" placeholder="Enter number of gutters" /></td>'+
      '<td><textarea class="form-control" type="text" name="comments[]" cols="50" rows="1" placeholder="Comments"></textarea></td>'+
        '<td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>'+
      '</tr>';

        $('tbody').append(tr);
});

$('tbody').on('click', '.deleteRow', function(){
    $(this).parent().parent().remove();
});

</script>
@endsection
