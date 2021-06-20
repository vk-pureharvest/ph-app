
@extends('layouts.app')


@section('header')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel1') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- new additions -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" type="text/css" /> 
    
    
     <!-- new additions -->

</head>
<style>
div {
  padding-right: 30px;
  padding-left: 40px;
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
  <br />
  <h3 aling="center">Add Quality Measures</h3>
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
  

  <form method="post" action="{{url('fruit_measures')}}">
   {{csrf_field()}}
 
   <div class="form-group w-25">
   <select class="form-control" id="selectCategory" name="site_name" required focus>
    <option value="Al Ain" selected>Al Ain</option>        
    <option value="Nahel">{{"Nahel"}}</option>
  </select>
  </div>

  <div class="form-group w-25">
    <input type="date" name="date_received" class="form-control" id="dob"  placeholder="Enter Date"/>
  </div>

  <div class="form-group w-25">  
       <input type="text" name="row_num" class="form-control" placeholder="Enter Row number" />   
  </div>

   <div class="form-group w-25">  
    <select class="form-control" id="selectProduct" name="product_type" required focus>
        <option value="" disabled selected>Select Product Type</option>          
        <option value="Candy">Candy</option>
        <option value="Cocktail">Cocktail</option>
        <option value="COV">COV</option>
        <option value="Heirloom">Heirloom</option>
        <option value="Mixed Candy">Mixed Candy</option>
        <option value="Orange TOV">Orange TOV</option>
        <option value="Plum">Plum</option>
        <option value="Strabena">Strabena</option>
        <option value="TOV">TOV</option>
        <option value="Yellow TOV">Yellow TOV</option>
        <option value="Yoom">Yoom</option>
      </select>
    </select>
  </div>
   <div class="form-group w-25">
   <input type="decimal" name="BRIX" class="form-control" placeholder="Enter BRIX" />    
   </div>
   <div class="form-group w-25">
   <input type="text" name="color" class="form-control" placeholder="Enter Color" />    
   </div>
   <div class="form-group w-25">
   <input type="decimal" name="weight" class="form-control" placeholder="Enter Weight" />    
   </div>
   <div class="form-group w-25">
   <input type="decimal" name="length" class="form-control" placeholder="Enter Length" />    
   </div>
   <div class="form-group w-25">
   <input type="decimal" name="width" class="form-control" placeholder="Enter Width" />    
   </div>
   <div class="form-group w-25">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>

@endsection
