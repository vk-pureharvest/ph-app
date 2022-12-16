
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
  
  
  <form action="{{url('strawberry_shelf_lives')}}"  method="post" enctype="multipart/form-data">
   {{csrf_field()}}
   
   <div><H4 >  Add Shelf Life Testing - Strawberry </H4></div>

   <div align="middle">
   <a href="{{route('strawberry_shelf_lives.index')}}" class="btn btn-primary">View Shelf Life Testing</a>
   <br />
   <br />
   <br />
  </div>

<div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>                 
        <option value="Oasis">{{"Oasis"}}</option>   
        <option value="KSA">{{"KSA"}}</option>
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
    <label class="col-sm-2 col-form-label">Date Harvested</label>
    <input class="form-control w-25" type="date" name="date_harvested" value=""/>
  </div> 
  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Day of Testing</label>
        <select class="form-control w-25" id="selectProduct" name="day_of_testing" required focus>
        <option value="" disabled selected>Day of Testing</option>          
        <option value="Day 1">Day 1</option>
        <option value="Day 4">Day 4</option>
        <option value="Day 6">Day 6</option>
        <option value="Day 8">Day 8</option>
        <option value="Day 11">Day 11</option>
        <option value="Day 13">Day 13</option>
        </select>  
        </div>
  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Product Type</label>
        <select class="form-control w-25" id="selectProduct" name="product_type" required focus>
        <option value="Bravura">Bravura</option>
        <option value="Albion">Albion</option>
        <option value="Carbillo">Carbillo</option>
        <option value="Furore">Furore</option>
        <option value="Mon' Murono">Mon' Murono</option>
        <option value="San Andreas">San Andreas</option>
        <option value="Aurora">Aurora</option>
        <option value="Favore">Favore</option>

        </select>  
        </div>
        
  <br />
  <div class="form-group row">
  <table class="table">
    <thead>
      <tr>
        <th>Class</th>
        <th>Color</th>

        <th>Weight (gm)</th>
        <th>Height (mm)</th>
        <th>Width (mm)</th>
        <th>Firmness</th> 

        <th>BRIX</th>
        <!-- <th>Firmness</th>  -->
        <!-- <th>Weight (gm)</th> -->
        <!-- <th>Height (mm)</th> -->
        <!-- <th>Width (mm)</th>  -->
        <th>Remarks</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td>
        <select class="form-control" id="selectProduct" name="class" required focus>
        <option value="" disabled selected>Choose Class</option>        
        <option value="1A">1A</option>         
        <option value="1B">1B</option>         
        <option value="2">2</option>  
        </select></td>
        <td><input type="decimal" name="color_L" class="form-control" placeholder="Enter L" />
        <input type="decimal" name="color_A" class="form-control" placeholder="Enter A" />
        <input type="decimal" name="color_B" class="form-control" placeholder="Enter B" />
        <select class="form-control" id="selectProduct" name="color_rank" required focus>
        <option value="" disabled selected>Choose Rank</option>        
        <option value="1">1 - Best</option>         
        <option value="2">2 - Good</option>         
        <option value="3">3 - Moderate</option>         
        <option value="4">4 - Poor</option>         
        <option value="5">5 - Worst</option>  
        </select></td>

        <td><input type="decimal" name="weight" class="form-control" placeholder="Enter Weight" /></td>
        <td><input type="decimal" name="height" class="form-control" placeholder="Enter Height" /></td>
        <td><input type="decimal" name="width" class="form-control" placeholder="Enter Width" /></td> 
        <td><input type="decimal" name="firmness" class="form-control" placeholder="Enter Firmness" />
        <select class="form-control" id="selectProduct" name="firmness_rank" required focus>
        <option value="" disabled selected>Choose Rank</option>        
        <option value="1">1 - Best</option>         
        <option value="2">2 - Good</option>         
        <option value="3">3 - Moderate</option>         
        <option value="4">4 - Poor</option>         
        <option value="5">5 - Worst</option>  
        </select></td> 

        <td><input type="decimal" name="BRIX" class="form-control" placeholder="Enter BRIX" /></td>
        <!-- <td><input type="decimal" name="firmness" class="form-control" placeholder="Enter Firmness" />
        <select class="form-control" id="selectProduct" name="firmness_rank" required focus>
        <option value="" disabled selected>Choose Rank</option>        
        <option value="1">1 - Best</option>         
        <option value="2">2 - Good</option>         
        <option value="3">3 - Moderate</option>         
        <option value="4">4 - Poor</option>         
        <option value="5">5 - Worst</option>  
        </select></td>  -->
        <!-- <td><input type="decimal" name="weight" class="form-control" placeholder="Enter Weight" /></td> -->
        <!-- <td><input type="decimal" name="height" class="form-control" placeholder="Enter Height" /></td> -->
        <!-- <td><input type="decimal" name="width" class="form-control" placeholder="Enter Width" /></td>  -->
        <td><textarea  class="form-control" white-space="pre-wrap" type="text"  name="remarks" placeholder="Remarks" rows="1" ></textarea></td>
      
      </tr>
      
    </tbody>
  </table>
</div>
    
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Select Image for Upload</label>
     <tr> <td width="30"><input type="file" name="image" /></td></tr>
   
     <!--  <input type="file" name="image" class="custom-file_input">
       <label class ="custom-file-label"> Choose file</lable>-->
    
  </div>
<br />
<div class="form-group w-25">
    <input style="position: relative; left: 250px" type="submit" value="Submit" class="btn btn-primary" />
    </form>
   </div>

    
  </form>
</div>
</div>
@endsection
