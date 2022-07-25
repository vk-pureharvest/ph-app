
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
  

  <form method="post" action="{{url('leafy_closing_stock')}}">
   {{csrf_field()}}
   
   <div><H4 >  Leafy Green Closing Stock </H4></div>

   <div align="middle">
   <a href="{{route('leafy_closing_stock.index')}}" class="btn btn-primary">View Leafy Greens Closing Stocks</a>
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
        <th>Closing Stock (KGs)</th>
        <th>Comments</th>
        <th><a href="javascript:;" type="button" class="btn btn-primary addRow" >+</a> </th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="" disabled selected>Product Type</option>        
        <option value="Red lettuce">Red lettuce</option>
        <option value="Green lettuce">Green lettuce</option>
        <option value="Baby Spinach">Baby Spinach</option>
        <option value="Rucola">Rucola</option>
        <option value="Mixed Salad">Mixed Salad</option>
        <option value="Green Tatsoi">Green Tatsoi</option>
        <option value="Red Totsoi">Red Totsoi</option>
        <option value="Mix Kales">Mix Kales</option>
        <option value="Green kale">Green kale</option>
        <option value="Caltivated Rucola">Caltivated Rucola</option>
        <option value="Sweet Genovess">Sweet Genovess</option>
        <option value="Rubi">Rubi</option>
        <option value="Sorell Red">Sorell Red</option>
        <option value="Green Fire">Green Fire</option>
        <option value="Bullas Blood">Bullas Blood</option>
        <option value="Red chard">Red chard</option>
        <option value="wasabina improved">wasabina improved</option>
        <option value="Russian kale">Russian kale</option>
        <option value="Red Russian">Red Russian</option>
        <option value="Red carpet">Red carpet</option>
        <option value="Red drgon">Red drgon</option>
        <option value="kale Scarlet">kale Scarlet</option>
        <option value="Pak choi">Pak choi</option>
        <option value="Gibbard Rz">Gibbard Rz</option>
        <option value="Crunchy Red">Crunchy Red</option>
        <option value="Warhol Rz">Warhol Rz</option>
        <option value="Crystal red lettuce/44CL5001">Crystal red lettuce/44CL5001</option>
        <option value="79-M/8166">79-M/8166</option>
        <option value="Bonarda Rz">Bonarda Rz</option>
        <option value="Frisee Lettuce">Frisee Lettuce</option>
        <option value="Curnchy Green Lettuce/ Exaudio">Curnchy Green Lettuce/ Exaudio</option>
        <option value="Oak leaf">Oak leaf</option>
        <option value="Lob jot">Lob jot</option>
        <option value="Curnchy Red Lettuce/ Binex">Curnchy Red Lettuce/ Binex</option>
        </select>  </td>
      <td><input type="decimal" name="total_kgs[]" class="form-control" placeholder="Enter KGs" value="0"/></td>
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
      ' <option value="Red lettuce">Red lettuce</option>'+
        '<option value="Green lettuce">Green lettuce</option>'+
        '<option value="Baby Spinach">Baby Spinach</option>'+
        '<option value="Rucola">Rucola</option>'+
        '<option value="Mixed Salad">Mixed Salad</option>'+
        '<option value="Green Tatsoi">Green Tatsoi</option>'+
        '<option value="Red Totsoi">Red Totsoi</option>'+
        '<option value="Mix Kales">Mix Kales</option>'+
        '<option value="Green kale">Green kale</option>'+
        '<option value="Caltivated Rucola">Caltivated Rucola</option>'+
        '<option value="Sweet Genovess">Sweet Genovess</option>'+
        '<option value="Rubi">Rubi</option>'+
        '<option value="Sorell Red">Sorell Red</option>'+
        '<option value="Green Fire">Green Fire</option>'+
        '<option value="Bullas Blood">Bullas Blood</option>'+
        '<option value="Red chard">Red chard</option>'+
        '<option value="wasabina improved">wasabina improved</option>'+
        '<option value="Russian kale">Russian kale</option>'+
        '<option value="Red Russian">Red Russian</option>'+
        '<option value="Red carpet">Red carpet</option>'+
        '<option value="Red drgon">Red drgon</option>'+
        '<option value="kale Scarlet">kale Scarlet</option>'+
        '<option value="Pak choi">Pak choi</option>'+
        '<option value="Gibbard Rz">Gibbard Rz</option>'+
        '<option value="Crunchy Red">Crunchy Red</option>'+
        '<option value="Warhol Rz">Warhol Rz</option>'+
        '<option value="Crystal red lettuce/44CL5001">Crystal red lettuce/44CL5001</option>'+
        '<option value="79-M/8166">79-M/8166</option>'+
        '<option value="Bonarda Rz">Bonarda Rz</option>'+
        '<option value="Frisee Lettuce">Frisee Lettuce</option>'+
        '<option value="Curnchy Green Lettuce/ Exaudio">Curnchy Green Lettuce/ Exaudio</option>'+
        '<option value="Oak leaf">Oak leaf</option>'+
        '<option value="Lob jot">Lob jot</option>'+
        '<option value="Curnchy Red Lettuce/ Binex">Curnchy Red Lettuce/ Binex</option>'+
        '</select>  </td>'+
      '<td><input type="decimal" name="total_kgs[]" class="form-control" placeholder="Enter total production" value="0"/></td>'+
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
