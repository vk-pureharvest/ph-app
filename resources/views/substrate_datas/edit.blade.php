
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
  <h3>Edit Substrate data</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('Substrate_Data_Controller@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$substrate_datas->site_name}}" selected="selected">{{$substrate_datas->site_name}}</option>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>
      </select>
  </div>
 
  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Date</label>
    <input class="form-control w-25" type="date" name="date_added"  value="{{$substrate_datas->date_added}}"/>
  </div>
 
  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Compartment</label>
      <select class="form-control w-25" id="selectCategory" name="compartment" required focus>
      <option value="{{$substrate_datas->compartment}}" selected="selected">{{$substrate_datas->compartment}}</option>
        <option value="CMP 1">CMP 1</option>        
        <option value="CMP 2">CMP 2</option>       
        <option value="CMP 3">CMP 3</option>     
        <option value="CMp 4">CMP 4</option>     
        <option value="CMP 5">CMP 5</option>     
        <option value="CMp 6">CMP 6</option>
      </select>
  </div>

  <br />
  <div class="form-group row">
  <table class="table">
    <thead>
      <tr>
        <th>Metric</th>
        <th>Plant 1</th>
        <th>Plant 2</th>
        <th>Plant 3</th> 
        <th><a href="javascript:;" type="button" class="btn btn-primary addRow" >+</a> </th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td><input type="text" name="metric" class="form-control" value="{{$substrate_datas->metric}}"/></td>
      <td><input type="decimal" name="pl_1" class="form-control"  value="{{$substrate_datas->pl_1}}"/></td>
      <td><input type="decimal" name="pl_2" class="form-control" value="{{$substrate_datas->pl_2}}" /></td>
      <td><input type="decimal" name="pl_3" class="form-control" value="{{$substrate_datas->pl_3}}"/></td>
        <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
      </tr>

      </tbody>
  </table>
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection