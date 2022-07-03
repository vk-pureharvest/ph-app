
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
  <h3>Edit Irrigation data</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('Irrigation_Data_Controller@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$irrigation_datas->site_name}}" selected="selected">{{$irrigation_datas->site_name}}</option>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>
      </select>
  </div>

  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Date</label>
    <input class="form-control w-25" type="date" name="date_added" value="{{$irrigation_datas->date_added}}"/>
  </div>
 

  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">RadSUM</label>
    <input class="form-control w-25" type="decimal" name="rad_sum" class="form-control"  value="{{$irrigation_datas->rad_sum}}"/>
  </div>

  
  <div class="form-group row">
  <table class="table">
    <thead>
      <tr>
        <th>Metric</th>
        <th>Valve 70</th>
        <th>Valve 80</th>
        <th>Valve 90</th>
        <th>Valve 100</th>
        <th>Valve 110</th>
        <th>Valve 120</th>
        <th>Valve 130</th>
        <th>Valve 140</th>
        <th>Valve 150</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td><input type="text" name="metric" class="form-control" value="{{$irrigation_datas->metric}}"/></td>
      <td><input type="decimal" name="v_70" class="form-control" value="{{$irrigation_datas->v_70}}"/></td>
      <td><input type="decimal" name="v_80" class="form-control" value="{{$irrigation_datas->v_80}}"/></td>
      <td><input type="decimal" name="v_90" class="form-control" value="{{$irrigation_datas->v_90}}"/></td>
      <td><input type="decimal" name="v_100" class="form-control" value="{{$irrigation_datas->v_100}}"/></td>
      <td><input type="decimal" name="v_110" class="form-control" value="{{$irrigation_datas->v_110}}"/></td>
      <td><input type="decimal" name="v_120" class="form-control" value="{{$irrigation_datas->v_120}}"/></td>
      <td><input type="decimal" name="v_130" class="form-control" value="{{$irrigation_datas->v_130}}"/></td>
      <td><input type="decimal" name="v_140" class="form-control" value="{{$irrigation_datas->v_140}}"/></td>
      <td><input type="decimal" name="v_150" class="form-control" value="{{$irrigation_datas->v_150}}"/></td>
      </tr>

</tbody>
  </table>
  <br />
  <br />
  <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
 </div>
</div>
 

@endsection