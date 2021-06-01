
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


  <form method="post" action="{{url('brixs2')}}">
   {{csrf_field()}}

   
<div class="form-group row">
  <table class="table">
    <thead>
      <tr>
        <th>Week #</th>
        <th>Product Type</th>
        <th>BRIX</th>
        <th><a href="javascript:;" class="btn btn-info addRow" >+</a> </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
            <input type="number" name="date_received[]" class="form-control"/>
        </td>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
                <option value="" disabled selected>Select Product Type</option>        
                <option value="COV">COV</option>
                <option value="TOV">TOV</option>
                <option value="Candy">Candy</option>   
            </select>    
        </td>
        
        <td>
            <input type="decimal" name="BRIX[]" class="form-control" placeholder="Enter BRIX" />    
        </td>
        <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
      </tr>
      <tbody>
      <tr>
        <td>
            <input type="number" name="date_received[]" class="form-control"/>
        </td>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
                <option value="" disabled selected>Select Product Type</option>        
                <option value="COV">COV</option>
                <option value="TOV">TOV</option>
                <option value="Candy">Candy</option>   
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
    
  </form>
 </div>
</div>

@endsection
