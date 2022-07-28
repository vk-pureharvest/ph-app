
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
  <form method="post" action="{{action('ShelfLifeTestController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
 
<div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$shelflifetests->site_name}}" selected="selected">{{$shelflifetests->site_name}}</option>
        <option value="Nahel">{{"Nahel"}}</option>       
        <option value="KSA">{{"KSA"}}</option>
      </select>
  </div> 
  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Date of Testing</label>
    <input class="form-control w-25" type="date" name="testing_date"  value="{{$shelflifetests->testing_date}}"/>
  </div> 
  
  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Date Harvested</label>
    <input class="form-control w-25" type="date" name="date_harvested"  value="{{$shelflifetests->date_harvested}}"/>
  </div> 
  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Day of Testing</label>
        <select class="form-control w-25" id="selectProduct" name="day_of_testing" required focus>
      <option value="{{$shelflifetests->day_of_testing}}" selected="selected">{{$shelflifetests->day_of_testing}}</option>
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
      <option value="{{$shelflifetests->product_type}}" selected="selected">{{$shelflifetests->product_type}}</option>
        <option value="TOV- Red">TOV- Red</option>
        <option value="TOV- Yellow">TOV- Yellow</option>
        <option value="TOV- Orange">TOV- Orange</option>
        <option value="COV- Red">COV- Red</option>
        <option value="Plum">Plum</option>
        <option value="Heirloom">Heirloom</option>
        <option value="Yoom">Yoom</option>
        <option value="Yellow COV">Yellow COV</option>
        <option value="Candy Yellow">Candy Yellow</option>
        <option value="Candy Red">Candy Red</option>
        <option value="Candy Pink">Candy Pink</option>
        <option value="Candy Green">Candy Green</option>
        <option value="Candy Orange">Candy Orange</option>
        <option value="Candy Brown">Candy Brown</option>
        <option value="Candy Nobula">Candy Nobula</option>
        <option value="Cocktail Tomato">Cocktail Tomato</option>
        <option value="Strabena">Strabena</option>
        </select>  
        </div>
        
  <br />

  <div class="form-group row">
  <table class="table">
    <thead>
      <tr>
        <th>Color</th>
        <th>BRIX</th>
        <th>Firmness</th>
        <th>Smell</th>
        <th>Weight (gm)</th>
        <th>Height (mm)</th>
        <th>Width (mm)</th>
        <th>Vine Quality</th>
        <th>Presence of Spots</th>
        <th>Presence of Wrinkles</th>
        <th>Presence of Fungus</th>
        <th>Final Quality Rank</th>
        <th>Remarks</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type="decimal" name="color_L" class="form-control" value="{{$shelflifetests->color_L}}"/>
        <input type="decimal" name="color_A" class="form-control" value="{{$shelflifetests->color_A}}" />
        <input type="decimal" name="color_B" class="form-control" value="{{$shelflifetests->color_B}}"/>
        <select class="form-control" id="selectProduct" name="color_rank" required focus>
      <option value="{{$shelflifetests->color_rank}}" selected="selected">{{$shelflifetests->color_rank}}</option>
        <option value="1">1 - Best</option>         
        <option value="2">2 - Good</option>         
        <option value="3">3 - Moderate</option>         
        <option value="4">4 - Poor</option>         
        <option value="5">5 - Worst</option>  
        </select></td>
        <td><input type="decimal" name="BRIX" class="form-control" value="{{$shelflifetests->BRIX}}"/></td>
        <td><input type="decimal" name="firmness" class="form-control" value="{{$shelflifetests->firmness}}" />
        <select class="form-control" id="selectProduct" name="firmness_rank" required focus>
      <option value="{{$shelflifetests->firmness_rank}}" selected="selected">{{$shelflifetests->firmness_rank}}</option>
        <option value="1">1 - Best</option>         
        <option value="2">2 - Good</option>         
        <option value="3">3 - Moderate</option>         
        <option value="4">4 - Poor</option>         
        <option value="5">5 - Worst</option>  
        </select></td>
        <td><select class="form-control" id="selectProduct" name="smell_rank" required focus>
      <option value="{{$shelflifetests->smell_rank}}" selected="selected">{{$shelflifetests->smell_rank}}</option>
        <option value="1">1 - Best</option>         
        <option value="2">2 - Good</option>         
        <option value="3">3 - Moderate</option>         
        <option value="4">4 - Poor</option>         
        <option value="5">5 - Worst</option>   
        </select></td>
        <td><input type="decimal" name="weight" class="form-control" value="{{$shelflifetests->smell_rank}}"  />
        <select class="form-control" id="selectProduct" name="weight_rank" required focus>
      <option value="{{$shelflifetests->weight_rank}}" selected="selected">{{$shelflifetests->weight_rank}}</option>
        <option value="1">1 - Best</option>         
        <option value="2">2 - Good</option>         
        <option value="3">3 - Moderate</option>         
        <option value="4">4 - Poor</option>         
        <option value="5">5 - Worst</option>   
        </select></td>
        <td><input type="decimal" name="height" class="form-control" value="{{$shelflifetests->height}}"/></td>
        <td><input type="decimal" name="width" class="form-control" value="{{$shelflifetests->width}}" /></td>
        <td><select class="form-control" id="selectProduct" name="vine_quality" required focus>
      <option value="{{$shelflifetests->vine_quality}}" selected="selected">{{$shelflifetests->vine_quality}}</option>
        <option value="Good">Good</option>         
        <option value="Dry">Dry</option>  
        </select></td>    
        <td><select class="form-control" id="selectProduct" name="spots" required focus>
      <option value="{{$shelflifetests->spots}}" selected="selected">{{$shelflifetests->spots}}</option>
        <option value="Yes">Yes</option>         
        <option value="No">No</option>  
        </select></td>
        <td><select class="form-control" id="selectProduct" name="wrinkles" required focus>
      <option value="{{$shelflifetests->wrinkles}}" selected="selected">{{$shelflifetests->wrinkles}}</option>
        <option value="Yes">Yes</option>         
        <option value="No">No</option>  
        </select></td>
        <td><select class="form-control" id="selectProduct" name="fungus" required focus>
      <option value="{{$shelflifetests->fungus}}" selected="selected">{{$shelflifetests->fungus}}</option>
        <option value="Yes">Yes</option>         
        <option value="No">No</option>  
        </select></td>
        <td><select class="form-control" id="selectProduct" name="quality_rank" required focus>
      <option value="{{$shelflifetests->quality_rank}}" selected="selected">{{$shelflifetests->quality_rank}}</option>
        <option value="1">1 - Best</option>         
        <option value="2">2 - Good</option>         
        <option value="3">3 - Moderate</option>         
        <option value="4">4 - Poor</option>         
        <option value="5">5 - Worst</option>  
        </select></td>
        <td><textarea  class="form-control"  type="text"  name="remarks" value="{{$shelflifetests->remarks}}" rows="1" ></textarea></td>
      
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