
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
  <h3>Edit Shelf life data</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('StrawberryShelfLifeController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
 
<div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$strawberry_shelf_lives->site_name}}" selected="selected">{{$strawberry_shelf_lives->site_name}}</option>
        <option value="Nahel">{{"Nahel"}}</option>              
        <option value="Al Ain">{{"Al Ain"}}</option>             
        <option value="Oasis">{{"Oasis"}}</option>      
        <option value="KSA">{{"KSA"}}</option>
      </select>
  </div> 
  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Date of Testing</label>
    <input class="form-control w-25" type="date" name="testing_date"  value="{{$strawberry_shelf_lives->testing_date}}"/>
  </div> 
  
  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Date Harvested</label>
    <input class="form-control w-25" type="date" name="date_harvested"  value="{{$strawberry_shelf_lives->date_harvested}}"/>
  </div> 
  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Day of Testing</label>
        <select class="form-control w-25" id="selectProduct" name="day_of_testing" required focus>
      <option value="{{$strawberry_shelf_lives->day_of_testing}}" selected="selected">{{$strawberry_shelf_lives->day_of_testing}}</option>
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
      <option value="{{$strawberry_shelf_lives->product_type}}" selected="selected">{{$strawberry_shelf_lives->product_type}}</option>
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
        <!-- <th>Firmness</th> -->
        <!-- <th>Class</th> -->
        <!-- <th>Weight (gm)</th>
        <th>Height (mm)</th>
        <th>Width (mm)</th>  -->
        <th>Remarks</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td><select class="form-control" id="selectProduct" name="class" required focus>
      <option value="{{$strawberry_shelf_lives->class}}" selected="selected">{{$strawberry_shelf_lives->class}}</option>
        <option value="1A">1A</option>         
        <option value="1B">1B</option>         
        <option value="2">2</option> 
        </select></td>
        
        <td><input type="decimal" name="color_L" class="form-control" value="{{$strawberry_shelf_lives->color_L}}"/>
        <input type="decimal" name="color_A" class="form-control" value="{{$strawberry_shelf_lives->color_A}}" />
        <input type="decimal" name="color_B" class="form-control" value="{{$strawberry_shelf_lives->color_B}}"/>
        <select class="form-control" id="selectProduct" name="color_rank" required focus>
      <option value="{{$strawberry_shelf_lives->color_rank}}" selected="selected">{{$strawberry_shelf_lives->color_rank}}</option>
        <option value="1">1 - Best</option>         
        <option value="2">2 - Good</option>         
        <option value="3">3 - Moderate</option>         
        <option value="4">4 - Poor</option>         
        <option value="5">5 - Worst</option>  
        </select></td>
        <td><input type="decimal" name="weight" class="form-control" value="{{$strawberry_shelf_lives->weight}}"  />
        <td><input type="decimal" name="height" class="form-control" value="{{$strawberry_shelf_lives->height}}"/></td>
        <td><input type="decimal" name="width" class="form-control" value="{{$strawberry_shelf_lives->width}}" /></td>
        <td><input type="decimal" name="firmness" class="form-control" value="{{$strawberry_shelf_lives->firmness}}" />
        <select class="form-control" id="selectProduct" name="firmness_rank" required focus>
      <option value="{{$strawberry_shelf_lives->firmness_rank}}" selected="selected">{{$strawberry_shelf_lives->firmness_rank}}</option>
        <option value="1">1 - Best</option>         
        <option value="2">2 - Good</option>         
        <option value="3">3 - Moderate</option>         
        <option value="4">4 - Poor</option>         
        <option value="5">5 - Worst</option>  
        </select></td>

        <td><input type="decimal" name="BRIX" class="form-control" value="{{$strawberry_shelf_lives->BRIX}}"/></td>
        <!-- <td><input type="decimal" name="firmness" class="form-control" value="{{$strawberry_shelf_lives->firmness}}" />
        <select class="form-control" id="selectProduct" name="firmness_rank" required focus>
      <option value="{{$strawberry_shelf_lives->firmness_rank}}" selected="selected">{{$strawberry_shelf_lives->firmness_rank}}</option>
        <option value="1">1 - Best</option>         
        <option value="2">2 - Good</option>         
        <option value="3">3 - Moderate</option>         
        <option value="4">4 - Poor</option>         
        <option value="5">5 - Worst</option>  
        </select></td> -->
        <!-- <td><select class="form-control" id="selectProduct" name="class" required focus>
      <option value="{{$strawberry_shelf_lives->class}}" selected="selected">{{$strawberry_shelf_lives->class}}</option>
        <option value="1A">1A</option>         
        <option value="1B">1B</option>         
        <option value="2">2</option> 
        </select></td> -->
        <!-- <td><input type="decimal" name="weight" class="form-control" value="{{$strawberry_shelf_lives->weight}}"  />
       
        <td><input type="decimal" name="height" class="form-control" value="{{$strawberry_shelf_lives->height}}"/></td>
        <td><input type="decimal" name="width" class="form-control" value="{{$strawberry_shelf_lives->width}}" /></td> -->
         
        <td><input type="text" name="remarks" class="form-control" value="{{$strawberry_shelf_lives->remarks}}" /></td>
        <!-- <td><textarea  class="form-control"  type="text"  name="remarks" value="{{$strawberry_shelf_lives->remarks}}" rows="1" ></textarea></td> -->
      
        </tr>
    </tbody>
  </table>
</div>
   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection