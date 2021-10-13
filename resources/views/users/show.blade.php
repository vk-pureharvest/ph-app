
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
                <a href="{{route('production-excel.exportProdExcel')}}">
                    <button type="button" class="btn btn-outline-info btn-sm m-0 waves-effect">
                        Download
                    </button>
                </a>        
            </td>
        </tr>
        <tr>
            <td>
                <p>Customer Complaints</p>
                <p style="color:grey;font-size:14px;text-align:justify">
                Download Historic Customer Complaints
                </p>
            </td>
            <td class="align-middle" style="text-align: right">
            <a href="{{route('complaint-excel.exportCompExcel')}}">
                    <button type="button" class="btn btn-outline-info btn-sm m-0 waves-effect">
                        Download
                    </button>
                </a>        
            </td>
        </tr>
        <tr>
            <td>
                <p>Dimensions/Quality</p>
                <p style="color:grey;font-size:14px;text-align:justify">
                Download Fruit Measures such as BRIX, Color, Weight, etc.
                </p>
            </td>
            <td class="align-middle" style="text-align: right">
            <a href="{{route('fruitmeasures-excel.exportDimExcel')}}">
                    <button type="button" class="btn btn-outline-info btn-sm m-0 waves-effect">
                        Download
                    </button>
                </a>        
            </td>
        </tr>
        <tr>
            <td>
                <p>Incidents</p>
                <p style="color:grey;font-size:14px;text-align:justify">
                Download Accident Reports
                </p>
            </td>
            <td class="align-middle" style="text-align: right">
            <a href="{{route('incidents-excel.exportIncidentExcel')}}">
                    <button type="button" class="btn btn-outline-info btn-sm m-0 waves-effect">
                        Download
                    </button>
                </a>        
            </td>
        </tr>     
        <tr>
            <td>
                <p>Pallet Tracker</p>
                <p style="color:grey;font-size:14px;text-align:justify">
                Download Pallet tracking details
                </p>
            </td>
            <td class="align-middle" style="text-align: right">
            <a href="{{route('pallet_tracker-excel.exportPalletExcel')}}">
                    <button type="button" class="btn btn-outline-info btn-sm m-0 waves-effect">
                        Download
                    </button>
                </a>        
            </td>
        </tr>   
        <tr>
            <td>
                <p>Production by Class</p>
                <p style="color:grey;font-size:14px;text-align:justify">
                Download Class 2 production details
                </p>
            </td>
            <td class="align-middle" style="text-align: right">
            <a href="{{route('class2_prod-excel.exportClass2ProdExcel')}}">
                    <button type="button" class="btn btn-outline-info btn-sm m-0 waves-effect">
                        Download
                    </button>
                </a>        
            </td>
        </tr>   
            <tr>
            <td>
                <p>Packing Quality Check</p>
                <p style="color:grey;font-size:14px;text-align:justify">
                Download Packing Quality Check data
                </p>
            </td>
            <td class="align-middle" style="text-align: right">
            <a href="{{route('packingqc-excel.exportPackingQCExcel')}}">
                    <button type="button" class="btn btn-outline-info btn-sm m-0 waves-effect">
                        Download
                    </button>
                </a>        
            </td>
        </tr>   
        <tr>
            <td>
                <p>Shelf Life Testing</p>
                <p style="color:grey;font-size:14px;text-align:justify">
                Download shelf lift testing data 
                </p>
            </td>
            <td class="align-middle" style="text-align: right">
            <a href="{{route('shelflifetests-excel.exportShelfLifeTestExcel')}}">
                    <button type="button" class="btn btn-outline-info btn-sm m-0 waves-effect">
                        Download
                    </button>
                </a>        
            </td>
        </tr> 
        <tr>
            <td>
                <p>Shelf Life Testing Strawberry</p>
                <p style="color:grey;font-size:14px;text-align:justify">
                Download shelf lift testing data for strawberries
                </p>
            </td>
            <td class="align-middle" style="text-align: right">
            <a href="{{route('shelflifeberry-excel.exportShelfLifeBerryExcel')}}">
                    <button type="button" class="btn btn-outline-info btn-sm m-0 waves-effect">
                        Download
                    </button>
                </a>        
            </td>
        </tr>   
        <tr>
            <td>
                <p>Closing Stock</p>
                <p style="color:grey;font-size:14px;text-align:justify">
                Download Cold Storage Closing Stock
                </p>
            </td>
            <td class="align-middle" style="text-align: right">
            <a href="{{route('inventory-excel.exportInventoryExcel')}}">
                    <button type="button" class="btn btn-outline-info btn-sm m-0 waves-effect">
                        Download
                    </button>
                </a>        
            </td>
        </tr>   
        <tr>
            <td>
                <p>Nahel Utitlies Data</p>
                <p style="color:grey;font-size:14px;text-align:justify">
                Download Nahel Utitlies Readings Data 
                </p>
            </td>
            <td class="align-middle" style="text-align: right">
            <a href="{{route('nahel_utitlies-excel.exportNahel_UtilityExcel')}}">
                    <button type="button" class="btn btn-outline-info btn-sm m-0 waves-effect">
                        Download
                    </button>
                </a>        
            </td>
        </tr>  
        <tr>
            <td>
                <p>Al Ain Utitlies Data</p>
                <p style="color:grey;font-size:14px;text-align:justify">
                Download Al Ain Utitlies Readings Data 
                </p>
            </td>
            <td class="align-middle" style="text-align: right">
            <a href="{{route('alain_utitlies-excel.exportAlAin_UtilityExcel')}}">
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
