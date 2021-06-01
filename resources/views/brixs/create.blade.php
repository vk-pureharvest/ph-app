
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
   <a href="{{route('brixs.index')}}" class="btn btn-primary">View BRIX Data</a>
   <br />
   <br />
  </div>

<div class="row">
 <div1 class="col-md-12">
  <br />
  <h3 aling="center">Add BRIX</h3>
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

  

  <form method="post" action="{{url('brixs')}}">
   {{csrf_field()}}

   
   <div class="form-group row">
  <table class="table">
    <thead>
      <tr>
        <th>Date</th>
        <th>Product Type</th>
        <th>BRIX</th>
        <th><a href="javascript:;" class="btn btn-info addRow" >+</a> </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
            <input type="date" name="date_received[]" class="form-control" id="dob"  placeholder="Enter Date"/>
        </td>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
                <option value="" disabled selected>Select Product Type</option>        
                <option value="COV">COV</option>
                <option value="TOV">TOV</option>
                <option value="Candy">Candy</option>
                <option value="Cocktail">Candy</option>   
            </select>    
        </td>
        
        <td>
            <input type="decimal" name="BRIX[]" class="form-control" placeholder="Enter BRIX" />    
        </td>
        <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
      </tr>
      
    </tbody>
  </table>
</div>

<div class="form-group w-25">
    <input type="submit" value="Submit" class="btn btn-primary" />
    </form>
   </div>

<script>
$('thead').on('click', '.addRow', function(){
    var tr='<tr>'+
        '<td>'+
            '<input type="date" name="date_received[]" class="form-control" id="dob"  placeholder="Enter Date"/>'+
        '</td>'+
        '<td>'+
            '<select class="form-control" id="selectProduct" name="product_type[]" required focus>'+
                '<option value="" disabled selected>Select Product Type</option> '+
                '<option value="TOV">TOV</option>'+
                '<option value="COV">COV</option>'+
                '<option value="Candy">Candy</option>'+
            '</select>     '+   
        '</td>'+
        '<td>'+
            '<input type="decimal" name="BRIX[]" class="form-control" placeholder="Enter BRIX" />    '+
        '</td>'+
        '<td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>';

        $('tbody').append(tr);
});

$('tbody').on('click', '.deleteRow', function(){
    $(this).parent().parent().remove();
});

</script>
    
  </form>
 </div1>
</div>
 

@endsection
