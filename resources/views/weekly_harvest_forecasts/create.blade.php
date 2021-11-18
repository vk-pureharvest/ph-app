
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
  

  <form method="post" action="{{url('weekly_harvest_forecasts')}}">
   {{csrf_field()}}
   
   <div><H4 >  Add Weekly Harvest Forecasts </H4></div>

   <div align="middle">
   <a href="{{route('weekly_harvest_forecasts.index')}}" class="btn btn-primary">View Weekly Forecasts</a>
   <br />
   <br />
   <br />
  </div>
  

  <div class="form-group row" style="width:564px;text-align: center;">
    
  </div> 
  
      <div class="form-group row" style="width:564px;text-align: center;">
        <label class="col-sm-2 col-form-label">Week #</label>
          <input class="form-control w-25" type="integer" name="week_num" >
     
          
      <label class="col-sm-2 col-form-label">Site</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>
      </select>

      </div>

  <br />
  
    <div class="form-group row" style="width:564px;text-align: center;">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>Crop Variety</th>
        <th>KGs Harvest</th>
      </tr>
    </thead>
    <tbody>
      <tr>        
      <td><input type="text" name="product_type[]" class="form-control" value="Round" /></td>
      <td><input type="decimal" name="kgs_harvested[]" class="form-control" placeholder="Enter KG" /></td>
      </tr>
      <tr>        
      <td><input type="text" name="product_type[]" class="form-control" value="TOV" /></td>
      <td><input type="decimal" name="kgs_harvested[]" class="form-control" placeholder="Enter KG" /></td>
      </tr>
      <tr>        
      <td><input type="text" name="product_type[]" class="form-control" value="COV" /></td>
      <td><input type="decimal" name="kgs_harvested[]" class="form-control" placeholder="Enter KG" /></td>
      </tr>
      <tr>        
      <td><input type="text" name="product_type[]" class="form-control" value="Candy" /></td>
      <td><input type="decimal" name="kgs_harvested[]" class="form-control" placeholder="Enter KG" /></td>
      </tr>
      <tr>        
      <td><input type="text" name="product_type[]" class="form-control" value="Mixed Candy" /></td>
      <td><input type="decimal" name="kgs_harvested[]" class="form-control" placeholder="Enter KG" /></td>
      </tr>
      <tr>        
      <td><input type="text" name="product_type[]" class="form-control" value="Plum" /></td>
      <td><input type="decimal" name="kgs_harvested[]" class="form-control" placeholder="Enter KG" /></td>
      </tr>
      <tr>        
      <td><input type="text" name="product_type[]" class="form-control" value="Strabena" /></td>
      <td><input type="decimal" name="kgs_harvested[]" class="form-control" placeholder="Enter KG" /></td>
      </tr>
      <tr>        
      <td><input type="text" name="product_type[]" class="form-control" value="Yellow TOV" /></td>
      <td><input type="decimal" name="kgs_harvested[]" class="form-control" placeholder="Enter KG" /></td>
      </tr>
      <tr>        
      <td><input type="text" name="product_type[]" class="form-control" value="Orange TOV" /></td>
      <td><input type="decimal" name="kgs_harvested[]" class="form-control" placeholder="Enter KG" /></td>
      </tr>
      <tr>        
      <td><input type="text" name="product_type[]" class="form-control" value="Heirloom" /></td>
      <td><input type="decimal" name="kgs_harvested[]" class="form-control" placeholder="Enter KG" /></td>
      </tr>
      <tr>        
      <td><input type="text" name="product_type[]" class="form-control" value="Yoom" /></td>
      <td><input type="decimal" name="kgs_harvested[]" class="form-control" placeholder="Enter KG" /></td>
      </tr>
      <tr>        
      <td><input type="text" name="product_type[]" class="form-control" value="Cocktail" /></td>
      <td><input type="decimal" name="kgs_harvested[]" class="form-control" placeholder="Enter KG" /></td>
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
@endsection
