
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
<style>
div1 {
  border-style: ridge;
  background-color: #F2F2F2;
  padding-right: 30px;
  padding-left: 80px;
}
div {
  padding-right: 30px;
  padding-left: 80px;
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

<div align="middle">
   <a href="{{route('dimensions.index')}}" class="btn btn-primary">View Size Data</a>
   <br />
   <br />
  </div>

<div class="row">
 <div1 class="col-md-12">
  <br />
  <h3 aling="center">Add Fruit Size and Weight</h3>
  <br />
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

  

  <form method="post" action="{{url('dimensions')}}">
   {{csrf_field()}}

   
   <div class="form-group row">
  <table class="table">
    <thead>
      <tr>
        <th>Date</th>
        <th>Product Type</th>
        <th>Length</th>
        <th>Width</th>
        <th>Weight</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
            <input type="date" name="date_added" class="form-control" id="dob"  placeholder="Enter Date"/>
        </td>
      <td>
        <select class="form-control" id="selectProduct" name="product_type" required focus>
                <option value="" disabled selected>Select Product Type</option> +
                <option value="Candy">Candy</option>+
                <option value="Cocktail">Cocktail</option>+
                <option value="Candy/Swetela">Candy/Swetela</option>+
                <option value="Cocktail Brioso">Cocktail Brioso</option>+
                <option value="Cocktail/Campri">Cocktail/Campri</option>+
                <option value="COV">COV</option>+
                <option value="Intense Plum">Intense Plum</option>+
                <option value="Intense Plum Line 09">Intense Plum Line 09</option>+
                <option value="Intense Plum Line 10">Intense Plum Line 10</option>+
                <option value="Pink Fujemaru">Pink Fujemaru</option>+
                <option value="Pink kavakutchi">Pink kavakutchi</option>+
                <option value="Pink Rose">Pink Rose</option>+
                <option value="Strabena">Strabena</option>+
                <option value="TOV">TOV</option>+
                <option value="Yoom">Yoom</option>+

            </select>    
        </td>
        
        <td>
            <input type="decimal" name="length" class="form-control" placeholder="Enter Length" />    
        </td>
        
        <td>
            <input type="decimal" name="width" class="form-control" placeholder="Enter Width" />    
        </td>
        <td>
            <input type="decimal" name="weight" class="form-control" placeholder="Enter Weight" />    
        </td>
      
    </tbody>
  </table>
</div>

<div class="form-group w-25">
    <input type="submit" value="Submit" class="btn btn-primary" />
    </form>
   </div>

    
  </form>
 </div1>
</div>
 

@endsection
