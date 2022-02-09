
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
  

  <form method="post" action="{{url('leafy_green_harvest')}}">
   {{csrf_field()}}
   
   <div><H4 > Leafy Green Harvesting Details </H4></div>

   <div align="middle">
   <a href="{{route('leafy_green_harvest.index')}}" class="btn btn-primary">View History</a>
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
        <th>Line Number</th>
        <th>Product Type</th>
        <th>Number of Gutters Harvested</th>
        <th>Remarks</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td><input class="form-control" type="integer" name="line_num[]" class="form-control"  value="1"/></td>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="Red Lettuce" selected>Red Lettuce</option>          
        <option value="Red Lettuce">Red Lettuce</option>
        <option value="Green Lettuce">Green Lettuce</option>
        <option value="Baby Spinach">Baby Spinach</option>
        <option value="Rucola">Rucola</option>
        </select>  
        </td>
        
      <td><input type="decimal" name="no_of_gutters[]" class="form-control" placeholder="Enter number of gutters" /></td>
       <td><textarea class="form-control" type="text" name="comments[]" cols="50" rows="1" placeholder="Comments"></textarea></td>       
      </tr>
      <tr>
      <td><input class="form-control" type="integer" name="line_num[]" class="form-control"  value="2"/></td>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="Green Lettuce" selected>Green Lettuce</option>          
        <option value="Red Lettuce">Red Lettuce</option>
        <option value="Green Lettuce">Green Lettuce</option>
        <option value="Baby Spinach">Baby Spinach</option>
        <option value="Rucola">Rucola</option>
        </select> 
      <td><input type="decimal" name="no_of_gutters[]" class="form-control" placeholder="Enter number of gutters" /></td>
       <td><textarea class="form-control" type="text" name="comments[]" cols="50" rows="1" placeholder="Comments"></textarea></td>       
      </tr> 
      <tr>
      <td><input class="form-control" type="integer" name="line_num[]" class="form-control"  value="3"/></td>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="Green Lettuce" selected>Green Lettuce</option>          
        <option value="Red Lettuce">Red Lettuce</option>
        <option value="Green Lettuce">Green Lettuce</option>
        <option value="Baby Spinach">Baby Spinach</option>
        <option value="Rucola">Rucola</option>
        </select> 
      <td><input type="decimal" name="no_of_gutters[]" class="form-control" placeholder="Enter number of gutters" /></td>
       <td><textarea class="form-control" type="text" name="comments[]" cols="50" rows="1" placeholder="Comments"></textarea></td>       
      </tr>
      <tr>
      <td><input class="form-control" type="integer" name="line_num[]" class="form-control"  value="4"/></td>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="Green Lettuce" selected>Green Lettuce</option>          
        <option value="Red Lettuce">Red Lettuce</option>
        <option value="Green Lettuce">Green Lettuce</option>
        <option value="Baby Spinach">Baby Spinach</option>
        <option value="Rucola">Rucola</option>
        </select> 
      <td><input type="decimal" name="no_of_gutters[]" class="form-control" placeholder="Enter number of gutters" /></td>
       <td><textarea class="form-control" type="text" name="comments[]" cols="50" rows="1" placeholder="Comments"></textarea></td>       
      </tr>
      <tr>
      <td><input class="form-control" type="integer" name="line_num[]" class="form-control"  value="5"/></td>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="Baby Spinach" selected>Baby Spinach</option>          
        <option value="Red Lettuce">Red Lettuce</option>
        <option value="Green Lettuce">Green Lettuce</option>
        <option value="Baby Spinach">Baby Spinach</option>
        <option value="Rucola">Rucola</option>
        </select> 
      <td><input type="decimal" name="no_of_gutters[]" class="form-control" placeholder="Enter number of gutters" /></td>
       <td><textarea class="form-control" type="text" name="comments[]" cols="50" rows="1" placeholder="Comments"></textarea></td>       
      </tr>
      <tr>
      <td><input class="form-control" type="integer" name="line_num[]" class="form-control"  value="6"/></td>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="Baby Spinach" selected>Baby Spinach</option>       
        <option value="Red Lettuce">Red Lettuce</option>
        <option value="Green Lettuce">Green Lettuce</option>
        <option value="Baby Spinach">Baby Spinach</option>
        <option value="Rucola">Rucola</option>
        </select> 
      <td><input type="decimal" name="no_of_gutters[]" class="form-control" placeholder="Enter number of gutters" /></td>
       <td><textarea class="form-control" type="text" name="comments[]" cols="50" rows="1" placeholder="Comments"></textarea></td>       
      </tr>
      <tr>
      <td><input class="form-control" type="integer" name="line_num[]" class="form-control"  value="7"/></td>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="Baby Spinach" selected>Baby Spinach</option>          
        <option value="Red Lettuce">Red Lettuce</option>
        <option value="Green Lettuce">Green Lettuce</option>
        <option value="Baby Spinach">Baby Spinach</option>
        <option value="Rucola">Rucola</option>
        </select> 
      <td><input type="decimal" name="no_of_gutters[]" class="form-control" placeholder="Enter number of gutters" /></td>
       <td><textarea class="form-control" type="text" name="comments[]" cols="50" rows="1" placeholder="Comments"></textarea></td>       
      </tr>
      <tr>
      <td><input class="form-control" type="integer" name="line_num[]" class="form-control"  value="8"/></td>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="Baby Spinach" selected>Baby Spinach</option>          
        <option value="Red Lettuce">Red Lettuce</option>
        <option value="Green Lettuce">Green Lettuce</option>
        <option value="Baby Spinach">Baby Spinach</option>
        <option value="Rucola">Rucola</option>
        </select> 
      <td><input type="decimal" name="no_of_gutters[]" class="form-control" placeholder="Enter number of gutters" /></td>
       <td><textarea class="form-control" type="text" name="comments[]" cols="50" rows="1" placeholder="Comments"></textarea></td>       
      </tr>
      <tr>
      <td><input class="form-control" type="integer" name="line_num[]" class="form-control"  value="9"/></td>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="Baby Spinach" selected>Baby Spinach</option>           
        <option value="Red Lettuce">Red Lettuce</option>
        <option value="Green Lettuce">Green Lettuce</option>
        <option value="Baby Spinach">Baby Spinach</option>
        <option value="Rucola">Rucola</option>
        </select> 
      <td><input type="decimal" name="no_of_gutters[]" class="form-control" placeholder="Enter number of gutters" /></td>
       <td><textarea class="form-control" type="text" name="comments[]" cols="50" rows="1" placeholder="Comments"></textarea></td>       
      </tr>
      <tr>
      <td><input class="form-control" type="integer" name="line_num[]" class="form-control"  value="10"/></td>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="Baby Spinach" selected>Baby Spinach</option>        
        <option value="Red Lettuce">Red Lettuce</option>
        <option value="Green Lettuce">Green Lettuce</option>
        <option value="Baby Spinach">Baby Spinach</option>
        <option value="Rucola">Rucola</option>
        </select> 
      <td><input type="decimal" name="no_of_gutters[]" class="form-control" placeholder="Enter number of gutters" /></td>
       <td><textarea class="form-control" type="text" name="comments[]" cols="50" rows="1" placeholder="Comments"></textarea></td>       
      </tr>
      <tr>
     

     </tbody>
  </table>
</div>
<br />
<div class="form-group w-25">
    <input style="position: relative; left: 250px" type="submit" value="Submit" class="btn btn-primary" />
    </form>
   </div>

    
</script>
@endsection
