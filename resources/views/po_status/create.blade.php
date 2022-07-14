
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
  <div><H4 >  Edit PO Status </H4></div>
  <br />
  <div align="middle">
   <a href="{{route('po_status.index')}}" class="btn btn-primary">View and Edit PO</a>
   <br />
   <br />
  </div>

 </div>
</div>

@endsection
