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
  <br />
  <div><H4 >  Cold Storage Temperature Monitoring </H4></div>
  <br />
  <div align="middle">
   <a href="{{route('cold_storage_temps.index')}}" class="btn btn-primary">Temperature Recordings</a>
   <br />
   <br />
  </div>

  <form action="{{url('cold_storage_temps')}}"  method="post">
   {{csrf_field()}}
     
  <div style="position: relative; left: 50px" class="form-group row">
      <label class="col-sm-2 col-form-label">Site Name</label>
        <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
          <option value="Al Ain" selected>Al Ain</option>        
          <option value="Nahel">{{"Nahel"}}</option>
        </select>
    </div>

    <?php
    date_default_timezone_set('Asia/Dubai');
    ?>
    <div style="position: relative; left: 50px" class="form-group row">
      <label class="col-sm-2 col-form-label">Date</label>
      <input class="form-control w-25" type="date" name="date_added" value="<?php echo date('Y-m-d'); ?>"/>
    </div>
  
  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">VISA Quality Controller</label>
    <input class="form-control w-25" type="text" name="quality_controller" class="form-control"  placeholder="Controller"/>
    </div>

    <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">VISA Shift Team Leader</label>
    <input class="form-control w-25" type="text" name="shift_leader" class="form-control"  placeholder="Team Leader"/>
    </div>
    
    <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Remarks</label>
    <textarea class="form-control w-25" type="text" name="remarks" cols="50" rows="1" placeholder="Remarks"></textarea>
    </div>
    <div class="form-group w-50">
    <table class="table">
    <thead>
      <tr>
        <th>Time Recorded</th>
        <th>Temperature</th>
        <th><a href="javascript:;" type="button" class="btn btn-primary addRow" >+</a> </th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td><select type="time" name="time_recorded[]" class="form-control" placeholder="Enter Time" required focus>
      <option value="0:00" selected="selected">0:00</option>          
      <option value="0:00">0:00</option> 
       <option value="4:00">4:00</option> 
       <option value="8:00">8:00</option> 
       <option value="12:00">12:00</option> 
       <option value="16:00">16:00</option> 
       <option value="20:00">20:00</option>
      </td>
      
        <td><input class="form-control" type="decimal" name="temp_recorded[]" placeholder="Temperature"/></td>
       
        <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
      </tr>
      <tr>
      <td><select type="time" name="time_recorded[]" class="form-control" placeholder="Enter Time" required focus>
      <option value="4:00" selected="selected">4:00</option>          
      <option value="0:00">0:00</option> 
       <option value="4:00">4:00</option> 
       <option value="8:00">8:00</option> 
       <option value="12:00">12:00</option> 
       <option value="16:00">16:00</option> 
       <option value="20:00">20:00</option>
      </td>
      
        <td><input class="form-control" type="decimal" name="temp_recorded[]" placeholder="Temperature"/></td>
       
        <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
      </tr>
      <tr>
      <td><select type="time" name="time_recorded[]" class="form-control" placeholder="Enter Time" required focus>
      <option value="8:00" selected="selected">8:00</option>        
      <option value="0:00">0:00</option> 
       <option value="4:00">4:00</option> 
       <option value="8:00">8:00</option> 
       <option value="12:00">12:00</option> 
       <option value="16:00">16:00</option> 
       <option value="20:00">20:00</option>
      </td>
      
        <td><input class="form-control" type="decimal" name="temp_recorded[]" placeholder="Temperature"/></td>
       
        <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
      </tr>
      <tr>
      <td><select type="time" name="time_recorded[]" class="form-control" placeholder="Enter Time" required focus>
      <option value="12:00" selected="selected">12:00</option>          
      <option value="0:00">0:00</option> 
       <option value="4:00">4:00</option> 
       <option value="8:00">8:00</option> 
       <option value="12:00">12:00</option> 
       <option value="16:00">16:00</option> 
       <option value="20:00">20:00</option>
      </td>
      
        <td><input class="form-control" type="decimal" name="temp_recorded[]" placeholder="Temperature"/></td>
       
        <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
      </tr>
      <tr>
      <td><select type="time" name="time_recorded[]" class="form-control" placeholder="Enter Time" required focus>
      <option value="16:00" selected="selected">16:00</option>          
      <option value="0:00">0:00</option> 
       <option value="4:00">4:00</option> 
       <option value="8:00">8:00</option> 
       <option value="12:00">12:00</option> 
       <option value="16:00">16:00</option> 
       <option value="20:00">20:00</option>
      </td>
      
        <td><input class="form-control" type="decimal" name="temp_recorded[]" placeholder="Temperature"/></td>
       
        <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
      </tr>
      <tr>
      <td><select type="time" name="time_recorded[]" class="form-control" placeholder="Enter Time" required focus>
      <option value="20:00" selected="selected">20:00</option>          
      <option value="0:00">0:00</option> 
       <option value="4:00">4:00</option> 
       <option value="8:00">8:00</option> 
       <option value="12:00">12:00</option> 
       <option value="16:00">16:00</option> 
       <option value="20:00">20:00</option>
      </td>
      
        <td><input class="form-control" type="decimal" name="temp_recorded[]" placeholder="Temperature"/></td>
       
        <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
      </tr>
     </tbody>
  </table>
</div>
  
  <br />
   <div class="form-group w-25">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
  <script>
$('thead').on('click', '.addRow', function(){
    var tr='<tr>'+
    '<td><select type="time" name="time_recorded[]" class="form-control" placeholder="Enter Time" required focus>'+
      '<option value="4:00" disabled selected>Choose Time</option>          '+
      '<option value="0:00">0:00</option> '+
       '<option value="4:00">4:00</option> '+
       '<option value="8:00">8:00</option> '+
       '<option value="12:00">12:00</option> '+
       '<option value="16:00">16:00</option> '+
       '<option value="20:00">20:00</option>'+
      '</td> <td><input class="form-control" type="decimal" name="temp_recorded[]" placeholder="Temperature"/></td>'+
      '<td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>'+
      '</tr>';

        $('tbody').append(tr);
});

$('tbody').on('click', '.deleteRow', function(){
    $(this).parent().parent().remove();
});

</script>
@endsection
