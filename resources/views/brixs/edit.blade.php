
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
  padding-left: 80px;
}
</style>

@endsection

@section('content')


<div class="row">
 <div class="col-md-12">
  <br />
  <h3>Edit BRIX</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('BrixesController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <input type="date" name="date_received" class="form-control" id="dob" value="{{$brix->date_received}}" placeholder="Enter Date" />
   </div>
   <div class="form-group">
    <select class="form-control" id="selectProduct" name="product_type[]" required focus>
                <option value="{{$brix->product_type}}" selected="selected">{{$brix->product_type}}</option>  
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

   </div>
   <div class="form-group">
    <input type="decimal" name="BRIX" class="form-control" value="{{$brix->BRIX}}" placeholder="Enter BRIX" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection