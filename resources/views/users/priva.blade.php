
@extends('layouts.app')


@section('header')
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
<div class="container">

<div class="row; mt-5">
<div class="col-md-8">


    <table class="table table-striped">
        <tbody>
        <tr>
            <td>
                <p>Production</p>
                <p style="color:grey;font-size:14px;text-align:justify">
                Download hourly production data by Workstation 
                </p>
            </td>
            <td class="align-middle" style="text-align: right">
                <a href="{{route('priva_prod-excel.exportPrivaProdExcel')}}">
                    <button type="button" class="btn btn-outline-info btn-sm m-0 waves-effect">
                        Download
                    </button>
                </a>        
            </td>
        </tr>
        
        </tbody>
    </table>

</div>
</div>
</div>

@endsection
