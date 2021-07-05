
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
  $(function() {
  $('#datetimepicker1').datetimepicker({
            format: 'HH:mm'
  });
  
  $('#datetimepicker2').datetimepicker({
          format: 'HH:mm'
  });
  $('#datetimepicker3').datetimepicker({
      format: 'hh:mm A',
  });
});
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">


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
  

  <form method="post" action="{{url('productions')}}">
   {{csrf_field()}}
   
   <div><H4 >  Add Hourly Production </H4></div>

   <div align="middle">
   <a href="{{route('productions.index')}}" class="btn btn-primary">View Hourly Production</a>
   <br />
   <br />
   <br />
  </div>

<div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
        <option value="Al Ain" selected>Al Ain</option>        
        <option value="Nahel">{{"Nahel"}}</option>
      </select>
  </div>

  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Date</label>
    <input class="form-control w-25" type="date" name="date_added" class="form-control" id="dob"  placeholder="Enter Date"/>
  </div>

  <div style="position: relative; left: 35px" class='input-group date' id='datetimepicker1'>
         <label class="col-sm-2 col-form-label">Start Time</label>
          <input type='text' name="start_time" class="form-control w-25" placeholder="Enter Start Time"/>
            <span class="input-group-addon" style="display: inline-block; position: relative;">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
  </div>
        <br/>
  <div style="position: relative; left: 35px" class='input-group date' id='datetimepicker2'>
         <label class="col-sm-2 col-form-label">End Time</label>
          <input type='text' name="end_time" class="form-control w-25" placeholder="Enter End Time"/>
            <span class="input-group-addon" style="display: inline-block; position: relative;">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
  </div>
    <br/>
  <div class="form-group row">
  <table class="table">
    <thead>
      <tr>
        <th>Workstation</th>
        <th>Number of people</th>
        <th>Production (Boxes)</th>
        <th>Product Type</th>
        <th>Harvest Date</th>
        <th>Comments</th>
        <th><a href="javascript:;" type="button" class="btn btn-primary addRow" >+</a> </th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td><select type="text" name="workstation[]" class="form-control" placeholder="Enter Workstation" required focus>
      <option value="" disabled selected>Select Workstation</option>          
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
        <option value="F">F</option>
        <option value="G">G</option>
        <option value="H">H</option>
      </td>
      <td><input type="integer" name="ppl_num[]" class="form-control" placeholder="Enter Number of people" /></td>
      <td><input type="integer" name="prod_boxes[]" class="form-control" placeholder="Enter number of boxes" /></td>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="" disabled selected>Product Type</option>          
        <option value="Candy">Candy</option>
        <option value="Cocktail">Cocktail</option>
        <option value="COV">COV</option>
        <option value="Heirloom">Heirloom</option>
        <option value="Mixed Candy">Mixed Candy</option>
        <option value="Orange TOV">Orange TOV</option>
        <option value="Plum">Plum</option>
        <option value="Round">Round</option>
        <option value="Strabena">Strabena</option>
        <option value="TOV">TOV</option>
        <option value="Yellow TOV">Yellow TOV</option>
        <option value="Yoom">Yoom</option>
        <option value="Other">None</option>
        </select>  
        </td>
        <td><input class="form-control" type="date" name="harvest_date[]" class="form-control" id="dob"  placeholder="Harvest Date"/></td>
        <td><input class="form-control" type="text" name="comment[]" class="form-control"  placeholder="Addln Comments"/></td>
  
        <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
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
  <script>
$('thead').on('click', '.addRow', function(){
    var tr='<tr>'+
      '<td><select type="text" name="workstation[]" class="form-control" placeholder="Enter Workstation" required focus>'+
      '<option value="" disabled selected>Select Workstation</option>'+
        '<option value="A">A</option>'+
        '<option value="B">B</option>'+
        '<option value="C">C</option>'+
        '<option value="D">D</option>'+
        '<option value="E">E</option>'+
        '<option value="F">F</option>'+
        '<option value="G">G</option>'+
        '<option value="H">H</option>'+
      '</td>'+
      '<td><input type="integer" name="ppl_num[]" class="form-control" placeholder="Enter Number of people" /></td>'+
      '<td><input type="integer" name="prod_boxes[]" class="form-control" placeholder="Enter number of boxes" /></td>'+
      '<td>'+
        '<select class="form-control" id="selectProduct" name="product_type[]" required focus>'+
        '<option value="" disabled selected>Product Type</option>'+
        '<option value="Candy">Candy</option>'+
        '<option value="Cocktail">Cocktail</option>'+
        '<option value="COV">COV</option>'+
        '<option value="Heirloom">Heirloom</option>'+
        '<option value="Mixed Candy">Mixed Candy</option>'+
        '<option value="Orange TOV">Orange TOV</option>'+
        '<option value="Plum">Plum</option>'+
        '<option value="Round">Round</option>'+
        '<option value="Strabena">Strabena</option>'+
        '<option value="TOV">TOV</option>'+
        '<option value="Yellow TOV">Yellow TOV</option>'+
        '<option value="Yoom">Yoom</option>'+
        '<option value="None">None</option>'+
        '</select>  '+
        '</td>'+
        '<td><input class="form-control" type="date" name="harvest_date[]" class="form-control" id="dob"  placeholder="Harvest Date"/></td>'+
        '<td><input class="form-control" type="text" name="comment[]" class="form-control" value="Addln comments" placeholder="Addln Comments"/></td>'+
        '<td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>'+
      '</tr>';

        $('tbody').append(tr);
});

$('tbody').on('click', '.deleteRow', function(){
    $(this).parent().parent().remove();
});

</script>
@endsection
