
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
  

  <form method="post" action="{{url('order_ful_ksas')}}">
   {{csrf_field()}}
   
   <div><H4 > Order fulfillment details </H4></div>

   <div align="middle">
   <a href="{{route('order_ful_ksas.index')}}" class="btn btn-primary">View History</a>
   <br />
   <br />
   <br />
  </div>

<div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
        <option value="KSA" selected>KSA</option>       
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
        <th>Ordered Quantity</th>
        <th>Delivered Quantity</th>
        <th>Forecasted Quantity</th>
        <th>Harvested Quantity</th> 
        <th>Remarks</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="TOV" selected>TOV</option>          
        <option value="COV">COV</option>          
        <option value="Strabena">Strabena</option>          
        <option value="Candy">Candy</option>          
        <option value="Mixed Candy">Mixed Candy</option>          
        <option value="Plum">Plum</option>          
        <option value="Cocktail">Cocktail</option>   
        </select>  
        </td>
        
      <td><input type="decimal" name="ordered_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="delivered_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="forecast_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="harvest_kg[]" class="form-control" placeholder="" /></td>
       <td><textarea class="form-control" type="text" name="comment[]" cols="50" rows="1" placeholder="Comment"></textarea></td>       
      </tr>
      <tr>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="TOV">TOV</option>          
        <option value="COV"selected>COV</option>          
        <option value="Strabena">Strabena</option>          
        <option value="Candy">Candy</option>          
        <option value="Mixed Candy">Mixed Candy</option>          
        <option value="Plum">Plum</option>          
        <option value="Cocktail">Cocktail</option>   
        </select>  
        </td>
        
      <td><input type="decimal" name="ordered_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="delivered_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="forecast_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="harvest_kg[]" class="form-control" placeholder="" /></td>
       <td><textarea class="form-control" type="text" name="comment[]" cols="50" rows="1" placeholder="Comment"></textarea></td>       
      </tr>
     
      <tr>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="TOV">TOV</option>          
        <option value="COV">COV</option>          
        <option value="Strabena" selected>Strabena</option>          
        <option value="Candy">Candy</option>          
        <option value="Mixed Candy">Mixed Candy</option>          
        <option value="Plum">Plum</option>          
        <option value="Cocktail">Cocktail</option>   
        </select>  
        </td>
        
      <td><input type="decimal" name="ordered_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="delivered_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="forecast_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="harvest_kg[]" class="form-control" placeholder="" /></td>
       <td><textarea class="form-control" type="text" name="comment[]" cols="50" rows="1" placeholder="Comment"></textarea></td>       
      </tr>

      <tr>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="TOV">TOV</option>          
        <option value="COV">COV</option>          
        <option value="Strabena">Strabena</option>          
        <option value="Candy" selected>Candy</option>          
        <option value="Mixed Candy">Mixed Candy</option>          
        <option value="Plum">Plum</option>          
        <option value="Cocktail">Cocktail</option>   
        </select>  
        </td>
        
      <td><input type="decimal" name="ordered_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="delivered_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="forecast_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="harvest_kg[]" class="form-control" placeholder="" /></td>
       <td><textarea class="form-control" type="text" name="comment[]" cols="50" rows="1" placeholder="Comment"></textarea></td>       
      </tr>
      <tr>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="TOV">TOV</option>          
        <option value="COV">COV</option>          
        <option value="Strabena">Strabena</option>          
        <option value="Candy">Candy</option>          
        <option value="Mixed Candy" selected>Mixed Candy</option>          
        <option value="Plum">Plum</option>          
        <option value="Cocktail">Cocktail</option>   
        </select>  
        </td>
        
      <td><input type="decimal" name="ordered_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="delivered_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="forecast_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="harvest_kg[]" class="form-control" placeholder="" /></td>
       <td><textarea class="form-control" type="text" name="comment[]" cols="50" rows="1" placeholder="Comment"></textarea></td>       
      </tr>
      <tr>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="TOV">TOV</option>          
        <option value="COV">COV</option>          
        <option value="Strabena">Strabena</option>          
        <option value="Candy">Candy</option>          
        <option value="Mixed Candy">Mixed Candy</option>          
        <option value="Plum"selected>Plum</option>          
        <option value="Cocktail">Cocktail</option>   
        </select>  
        </td>
        
      <td><input type="decimal" name="ordered_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="delivered_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="forecast_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="harvest_kg[]" class="form-control" placeholder="" /></td>
       <td><textarea class="form-control" type="text" name="comment[]" cols="50" rows="1" placeholder="Comment"></textarea></td>       
      </tr>
      <tr>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="TOV">TOV</option>          
        <option value="COV">COV</option>          
        <option value="Strabena">Strabena</option>          
        <option value="Candy">Candy</option>          
        <option value="Mixed Candy">Mixed Candy</option>          
        <option value="Plum">Plum</option>          
        <option value="Cocktail" selected>Cocktail</option>   
        </select>  
        </td>
        
      <td><input type="decimal" name="ordered_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="delivered_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="forecast_kg[]" class="form-control" placeholder="" /></td>
      <td><input type="decimal" name="harvest_kg[]" class="form-control" placeholder="" /></td>
       <td><textarea class="form-control" type="text" name="comment[]" cols="50" rows="1" placeholder="Comment"></textarea></td>       
      </tr>
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
