
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
  <h3>Edit Production data</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('ProductionsKSAController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$productions->site_name}}" selected="selected">{{$productions->site_name}}</option>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Date Added</label>
      <input class="form-control w-25"  type="date" name="date_added" class="form-control" id="dob" value="{{$productions->date_added}}"/>
  </div>

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Start Time</label>
    <input class="form-control w-25" type="time" name="start_time" class="form-control" value="{{$productions->start_time}}" placeholder="Enter Date" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">End Time</label>
    <input class="form-control w-25" type="time" name="end_time" class="form-control" value="{{$productions->end_time}}" placeholder="Enter Date" />
   </div>
   
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Workstation</label>
    <select class="form-control w-25" id="text" name="workstation" required focus>
                <option value="{{$productions->workstation}}" selected="selected">{{$productions->workstation}}</option>  
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
                <option value="I">I</option>
                <option value="J">J</option>
                <option value="K">K</option>
                <option value="L">L</option>
                <option value="Candy Machine">Candy Machine</option>
        <option value="Box Folding">Box Folding</option>
   </select>
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Number of people</label>
    <input class="form-control w-25" type="decimal" name="ppl_num" class="form-control" value="{{$productions->ppl_num}}" placeholder="Enter Color L" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Employee</label>
    <select class="form-control w-25" id="text" name="employee" required focus>
                <option value="{{$productions->employee}}" selected="selected">{{$productions->employee}}</option>  
                <option value="Person 1">Person 1</option>         
                <option value="Person 2">Person 2</option>         
                <option value="Person 3">Person 3</option>         
                <option value="Person 4">Person 4</option>         
                <option value="Person 5">Person 5</option>         
                <option value="Person 6">Person 6</option>         
                <option value="Person 7">Person 7</option>         
                <option value="Person 8">Person 8</option>         
                <option value="Person 9">Person 9</option>         
                <option value="Person 10">Person 10</option>         
                <option value="Person 11">Person 11</option>         
                <option value="Person 12">Person 12</option>         
                <option value="Person 13">Person 13</option>         
                <option value="Person 14">Person 14</option>         
                <option value="Person 15">Person 15</option>         
                <option value="Person 16">Person 16</option>
   </select>
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Production (boxes)</label>
    <input class="form-control w-25" type="decimal" name="prod_boxes" class="form-control" value="{{$productions->prod_boxes}}" placeholder="Enter Color A" />
   </div>

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Product Type</label>
    <select class="form-control w-25" id="selectProduct" name="product_type" required focus>
                <option value="{{$productions->product_type}}" selected="selected">{{$productions->product_type}}</option>  
                <option value="Plum 5kg">Plum 5kg</option>
                <option value="Round 5kg">Round 5kg</option>
                <option value="TOV">TOV</option>
                <option value="TOV - Yellow">TOV - Yellow</option>
                <option value="TOV - Orange">TOV - Orange</option>
                <option value="TOV Pink">TOV Pink</option>
                <option value="TOV Green">TOV Green</option>
                <option value="Heirloom">Heirloom</option>
                <option value="COV">COV</option>
                <option value="COV Yellow">COV Yellow</option>
                <option value="Strabena">Strabena</option>
                <option value="Yoom">Yoom</option>
                <option value="Cocktail">Cocktail</option>
                <option value="Candy Cup">Candy Cup</option>
                <option value="Candy 350gm kft">Candy 350gm kft</option>
                <option value="Candy Shaker">Candy Shaker </option>
                <option value="Candy Mixed Shaker">Candy Mixed Shaker </option>
                <option value="Candy Mixed">Candy Mixed</option>
                <option value="Candy (loose)">Candy (loose)</option>
                <option value="COV (loose)">COV (loose)</option>
                <option value="Cocktail (loose)">Cocktail (loose)</option>
                <option value="Strabena (loose)">Strabena (loose)</option>
                <option value="Mixed candy (loose)">Mixed candy (loose)</option>
                <option value="COV Yellow (Loose)">COV Yellow (Loose)</option>
                <option value="COV Orange(Loose)">COV Orange(Loose)</option>
                <option value="SF COV">SF COV</option>
                <option value="FF COV">FF COV</option>
                <option value="SF Candy">SF Candy</option>
                <option value="FF Candy">FF Candy</option>
                <option value="Strawberry Loose">Strawberry Loose</option>  
                <option value="Strawberry Branded">Strawberry Branded</option>
                <option value="Strawberry Unbranded">Strawberry Unbranded</option>
                <option value="Other">Other</option>
            </select>

   </div>
   
   
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Harvest Date</label>
      <input class="form-control w-25"  type="date" name="harvest_date" class="form-control" id="dob" value="{{$productions->harvest_date}}"/>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Comments</label>
      <input class="form-control w-25"  type="text" name="comment" class="form-control" id="dob" value="{{$productions->comment}}"/>
  </div>
   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection