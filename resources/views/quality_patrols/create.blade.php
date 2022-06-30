
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
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
    
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

    function dynamicdropdown(listindex)
    {
        switch (listindex)
        {
        case "100 - Product Quality" :
            document.getElementById("status").options[0]=new Option("Select Category #2","");
            document.getElementById("status").options[1]=new Option("110 - Size","110 - Size");
            document.getElementById("status").options[2]=new Option("120 - Color","120 - Color");
            document.getElementById("status").options[3]=new Option("130 - Shape","130 - Shape");
            document.getElementById("status").options[4]=new Option("140 - Taste","140 - Taste");
            document.getElementById("status").options[5]=new Option("150 - Hardness","150 - Hardness");
            document.getElementById("status").options[6]=new Option("160 - Defects ","160 - Defects ");
            document.getElementById("status").options[7]=new Option("170 - Smell","170 - Smell");
            document.getElementById("status").options[8]=new Option("180 - Wrong pack weight","180 - Wrong pack weight");
            break;
        case "200 - Service quality" :
            document.getElementById("status").options[0]=new Option("Select Category #2","");
            document.getElementById("status").options[1]=new Option("210 - Quantity","210 - Quantity");
            document.getElementById("status").options[2]=new Option("220 - Wrong product","220 - Wrong product");
            document.getElementById("status").options[3]=new Option("230 - Late delivery","230 - Late delivery");
            document.getElementById("status").options[4]=new Option("240 - Wrong destination","240 - Wrong destination");
            document.getElementById("status").options[5]=new Option("250 - Damage in transport","250 - Damage in transport");
            document.getElementById("status").options[6]=new Option("","");
            document.getElementById("status").options[7]=new Option("","");
            document.getElementById("status").options[8]=new Option("","");
            break;
        case "300 - Admin error" :
            document.getElementById("status").options[0]=new Option("Select Category #2","");
            document.getElementById("status").options[1]=new Option("310 - Wrong quantity","310 - Wrong quantity");
            document.getElementById("status").options[2]=new Option("320 - Wrong product","320 - Wrong product");
            document.getElementById("status").options[3]=new Option("330 - Wrong price","330 - Wrong price");
            document.getElementById("status").options[4]=new Option("","");
            document.getElementById("status").options[5]=new Option("","");
            document.getElementById("status").options[6]=new Option("","");
            document.getElementById("status").options[7]=new Option("","");
            document.getElementById("status").options[8]=new Option("","");
            break;
        }
        return true;
    }
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
  <br />
  <div><H4 >  Enter Quality Checks </H4></div>
  <br />
  <div align="middle">
   <a href="{{route('quality_patrols.index')}}" class="btn btn-primary">View Quality Check Data</a>
   <br />
   <br />
  </div>

  <form action="{{url('quality_patrols')}}"  method="post" enctype="multipart/form-data">
   {{csrf_field()}}
 
   <div class="row col-md-5 col-lg-5 col-sm-5 pull-left">
    <label class="row col-md-5 col-lg-5 col-sm-5 pull-left">Site Name</label>
      <select class="row col-md-5 col-lg-5 col-sm-5 pull-left" name="site_name" required focus>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>      
        <option value="Harradh">{{"Harradh"}}</option>
      </select>
  </div>
  <br />
  <?php
  date_default_timezone_set('Asia/Dubai');
  ?>
   <div class="row col-md-5 col-lg-5 col-sm-5 pull-left">
    <label class="row col-md-5 col-lg-5 col-sm-5 pull-left">Date</label>
    <input class="row col-md-5 col-lg-5 col-sm-5 pull-left" type="date" name="date_added" value="<?php echo date('Y-m-d'); ?>"/>
  </div> 
  
  <br />
  <div class="row col-md-5 col-lg-5 col-sm-5 pull-left">
    <label class="row col-md-5 col-lg-5 col-sm-5 pull-left">Product Type</label>
    <select class="row col-md-5 col-lg-5 col-sm-5 pull-left" id="selectProduct" name="category" required focus>
    <option value="" disabled selected>Select Product Type</option>        
    <option value="Red Candy">Red Candy</option>
    <option value="Pink Candy">Pink Candy</option>
    <option value="Brown Candy">Brown Candy</option>
    <option value="Green Candy">Green Candy</option>
    <option value="Yellow Candy">Yellow Candy</option>
    <option value="Orange Candy">Orange Candy</option>
    <option value="Cocktail">Cocktail</option>
    <option value="Red COV">Red COV</option>
    <option value="Yellow COV">Yellow COV</option>
    <option value="Heirloom">Heirloom</option>
    <option value="Kale">Kale</option>
    <option value="Mixed Candy">Mixed Candy</option>
    <option value="Orange TOV">Orange TOV</option>
    <option value="Plum">Plum</option>
    <option value="Round">Round</option>
    <option value="Strabena">Strabena</option>
    <option value="TOV">TOV</option>
    <option value="Yellow TOV">Yellow TOV</option>
    <option value="Yoom">Yoom</option>
    <option value="Strawberry - Albion">Strawberry - Albion</option>  
    <option value="Strawberry - Aurora Karima">Strawberry - Aurora Karima</option>
    <option value="Strawberry - Bravura">Strawberry - Bravura</option>
    <option value="Strawberry - Carbillo">Strawberry - Carbillo</option>
    <option value="Strawberry - Furore">Strawberry - Furore</option>
    <option value="Strawberry - Murano">Strawberry - Murano</option>
    <option value="Strawberry - San Andreas">Strawberry - San Andreas</option>
    <option value="Sweet Pointed Chili Pepper">Sweet Pointed Chili Pepper</option>
    <option value="Red Lettuce">Red Lettuce</option>
    <option value="Green Lettuce">Green Lettuce</option>
    <option value="Baby Spinach">Baby Spinach</option>
    <option value="Rucola">Rucola</option>
    <option value="Mix Salad">Mix Salad</option>
    <option value="Green Tatsoi">Green Tatsoi</option>
    <option value="Microgreens">Microgreens</option>
    <option value="Nebola">Nebola</option>
    <option value="Other">Other</option>
  </select>
  </div>
  
  <br />
    <div class="row col-md-5 col-lg-5 col-sm-5 pull-left">
    <label class="row col-md-5 col-lg-5 col-sm-5 pull-left">If Other State Reason?</label>
    <textarea white-space="pre-wrap" type="text" class="row col-md-5 col-lg-5 col-sm-5 pull-left" name="sub_category" placeholder="If Other enter reason" cols="100" rows="1"></textarea>
  </div>
   
  <br />
  
  <div class="row col-md-5 col-lg-5 col-sm-5 pull-left">
    <label class="row col-md-5 col-lg-5 col-sm-5 pull-left">Details</label>
    <textarea white-space="pre-wrap" type="text" class="row col-md-5 col-lg-5 col-sm-5 pull-left" name="details" placeholder="If Other enter reason" cols="100" rows="4"></textarea>
  </div>
  
  <br />
  <div class="row col-md-5 col-lg-5 col-sm-5 pull-left">
    <label for="files" class="row col-md-5 col-lg-5 col-sm-5 pull-left">Select Images for Upload</label>
     <tr> <td width="30"><input type="file" name="images[]"  multiple /></td></tr>
   
     <!--  <input type="file" name="image" class="custom-file_input">
       <label class ="custom-file-label"> Choose file</lable>-->
    
  </div>
  <br />
   <div class="form-group w-25">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>

@endsection
