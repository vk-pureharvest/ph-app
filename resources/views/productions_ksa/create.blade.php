
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
  

  <form method="post" action="{{url('productions_ksa')}}">
   {{csrf_field()}}
   
   <div><H4 >  Add Hourly Production </H4></div>

   <div align="middle">
   <a href="{{route('productions_ksa.index')}}" class="btn btn-primary">View Hourly Production</a>
   <br />
   <br />
   <br />
  </div>

<div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
        <option value="KSA" selected>KSA</option>        
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
    <label class="col-sm-2 col-form-label">Start Time</label>
    <input class="form-control w-25" type="time" name="start_time" class="form-control" placeholder="Enter Start Time"/>
  </div>

  <div style="position: relative; left: 50px" class="form-group row">
    <label class="col-sm-2 col-form-label">End Time</label>
    <input class="form-control w-25" type="time" name="end_time" class="form-control"  placeholder="Enter End Time"/>
  </div>
  <br />
  <div class="form-group row">
  <table class="table">
    <thead>
      <tr>
        <th>Workstation</th>
        <th>Person</th>
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
        <option value="I">I</option>
        <option value="J">J</option>
        <option value="K">K</option>
        <option value="L">L</option>
        <option value="Candy Machine">Candy Machine</option>
        <option value="Box Folding">Box Folding</option>
      </td>
      <td><select type="text" name="employee[]" class="form-control" placeholder="Enter Name of person" required focus>
      <option value="" disabled selected>Select Name</option>          
      <option value='Abdulkadir Mwichande Abdi'>Abdulkadir Mwichande Abdi</option>
                <option value='Abu Baker Adam'>Abu Baker Adam</option>
                <option value='Akram Ssesanga'>Akram Ssesanga</option>
                <option value='Andrew . Kityo'>Andrew . Kityo</option>
                <option value='Atrash Zuber Mohamed'>Atrash Zuber Mohamed</option>
                <option value='Daniel Denge Karisa'>Daniel Denge Karisa</option>
                <option value='Daniel Muchira Kinyua'>Daniel Muchira Kinyua</option>
                <option value='David Daniel Sebuliba'>David Daniel Sebuliba</option>
                <option value='Dominic Njuguna Karanja'>Dominic Njuguna Karanja</option>
                <option value='Eria Mpoya'>Eria Mpoya</option>
                <option value='Francis Tudeka'>Francis Tudeka</option>
                <option value='Francis Wanderi Maina'>Francis Wanderi Maina</option>
                <option value='Francisco Tamale'>Francisco Tamale</option>
                <option value='Geofrey Mulumba Buyinza'>Geofrey Mulumba Buyinza</option>
                <option value='Haidara Athman Kirao'>Haidara Athman Kirao</option>
                <option value='Henry Ndungu Mwituria'>Henry Ndungu Mwituria</option>
                <option value='Israel Tom Kiru'>Israel Tom Kiru</option>
                <option value='Ivan Tulinawe'>Ivan Tulinawe</option>
                <option value='Lokendra Bahadur Mahato'>Lokendra Bahadur Mahato</option>
                <option value='Manisulu Kimera'>Manisulu Kimera</option>
                <option value='Mbarak Hussein Mbarak'>Mbarak Hussein Mbarak</option>
                <option value='Moses Amani Thomas'>Moses Amani Thomas</option>
                <option value='Mulishid Wangi'>Mulishid Wangi</option>
                <option value='Paul Kamau Migwi'>Paul Kamau Migwi</option>
                <option value='Raphael Gituru Ndegwa'>Raphael Gituru Ndegwa</option>
                <option value='Samuel Murithi Waringa'>Samuel Murithi Waringa</option>
                <option value='Suleiman Dena Mwalimu'>Suleiman Dena Mwalimu</option>
                <option value='Zacharia Kariuki Kamau'>Zacharia Kariuki Kamau</option>
  </td>
      <td><input type="integer" name="prod_boxes[]" class="form-control" placeholder="Enter number of boxes" /></td>
      <td>
        <select class="form-control" id="selectProduct" name="product_type[]" required focus>
        <option value="" disabled selected>Product Type</option>          
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
        <option value="Candy Shaker">Candy Shaker</option>
        <option value="Candy Mixed Shaker">Candy Mixed Shaker</option>
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
        '<option value="I">I</option>'+
        '<option value="J">J</option>'+
        '<option value="K">K</option>'+
        '<option value="L">L</option>'+
        '<option value="Candy Machine">Candy Machine</option>'+
        '<option value="Box Folding">Box Folding</option>'+
      '</td>'+
      '<td><select type="text" name="employee[]" class="form-control" placeholder="Enter Name of person" required focus>'+
      '<option value="" disabled selected>Select Name</option>'+
      '<option value='Abdulkadir Mwichande Abdi'>Abdulkadir Mwichande Abdi</option>'+
                '<option value='Abu Baker Adam'>Abu Baker Adam</option>'+
                '<option value='Akram Ssesanga'>Akram Ssesanga</option>'+
                '<option value='Andrew . Kityo'>Andrew . Kityo</option>'+
                '<option value='Atrash Zuber Mohamed'>Atrash Zuber Mohamed</option>'+
                '<option value='Daniel Denge Karisa'>Daniel Denge Karisa</option>'+
                '<option value='Daniel Muchira Kinyua'>Daniel Muchira Kinyua</option>'+
                '<option value='David Daniel Sebuliba'>David Daniel Sebuliba</option>'+
                '<option value='Dominic Njuguna Karanja'>Dominic Njuguna Karanja</option>'+
                '<option value='Eria Mpoya'>Eria Mpoya</option>'+
                '<option value='Francis Tudeka'>Francis Tudeka</option>'+
                '<option value='Francis Wanderi Maina'>Francis Wanderi Maina</option>'+
                '<option value='Francisco Tamale'>Francisco Tamale</option>'+
                '<option value='Geofrey Mulumba Buyinza'>Geofrey Mulumba Buyinza</option>'+
                '<option value='Haidara Athman Kirao'>Haidara Athman Kirao</option>'+
                '<option value='Henry Ndungu Mwituria'>Henry Ndungu Mwituria</option>'+
                '<option value='Israel Tom Kiru'>Israel Tom Kiru</option>'+
                '<option value='Ivan Tulinawe'>Ivan Tulinawe</option>'+
                '<option value='Lokendra Bahadur Mahato'>Lokendra Bahadur Mahato</option>'+
                '<option value='Manisulu Kimera'>Manisulu Kimera</option>'+
                '<option value='Mbarak Hussein Mbarak'>Mbarak Hussein Mbarak</option>'+
                '<option value='Moses Amani Thomas'>Moses Amani Thomas</option>'+
                '<option value='Mulishid Wangi'>Mulishid Wangi</option>'+
                '<option value='Paul Kamau Migwi'>Paul Kamau Migwi</option>'+
                '<option value='Raphael Gituru Ndegwa'>Raphael Gituru Ndegwa</option>'+
                '<option value='Samuel Murithi Waringa'>Samuel Murithi Waringa</option>'+
                '<option value='Suleiman Dena Mwalimu'>Suleiman Dena Mwalimu</option>'+
                '<option value='Zacharia Kariuki Kamau'>Zacharia Kariuki Kamau</option>'+

  '</td>'+
      '<td><input type="integer" name="prod_boxes[]" class="form-control" placeholder="Enter number of boxes" /></td>'+
      '<td>'+
        '<select class="form-control" id="selectProduct" name="product_type[]" required focus>'+
        '<option value="" disabled selected>Product Type</option>'+
        '<option value="Plum 5kg">Plum 5kg</option>'+
        '<option value="Round 5kg">Round 5kg</option>'+
        '<option value="TOV">TOV</option>'+
        '<option value="TOV - Yellow">TOV - Yellow</option>'+
        '<option value="TOV - Orange">TOV - Orange</option>'+
        '<option value="TOV Pink">TOV Pink</option>'+
        '<option value="TOV Green">TOV Green</option>'+
        '<option value="Heirloom">Heirloom</option>'+
        '<option value="COV">COV</option>'+
        '<option value="COV Yellow">COV Yellow</option>'+
        '<option value="Strabena">Strabena</option>'+
        '<option value="Yoom">Yoom</option>'+
        '<option value="Cocktail">Cocktail</option>'+
        '<option value="Candy Cup">Candy Cup</option>'+
        '<option value="Candy 350gm kft">Candy 350gm kft</option>'+
        '<option value="Candy Shaker">Candy Shaker</option>'+
        '<option value="Candy Mixed Shaker">Candy Mixed Shaker</option>'+
        '<option value="Candy Mixed">Candy Mixed</option>'+
        '<option value="Candy (loose)">Candy (loose)</option>'+
        '<option value="COV (loose)">COV (loose)</option>'+
        '<option value="Cocktail (loose)">Cocktail (loose)</option>'+
        '<option value="Strabena (loose)">Strabena (loose)</option>'+
        '<option value="Mixed candy (loose)">Mixed candy (loose)</option>'+
        '<option value="COV Yellow (Loose)">COV Yellow (Loose)</option>'+
        '<option value="COV Orange(Loose)">COV Orange(Loose)</option>'+
        '<option value="SF COV">SF COV</option>'+
        '<option value="FF COV">FF COV</option>'+
        '<option value="SF Candy">SF Candy</option>'+
        '<option value="FF Candy">FF Candy</option>'+
        '<option value="Strawberry Loose">Strawberry Loose</option>  '+
        '<option value="Strawberry Branded">Strawberry Branded</option>'+
        '<option value="Strawberry Unbranded">Strawberry Unbranded</option>'+
        '<option value="Other">Other</option>'+
        '</select>  '+
        '</td>'+
        '<td><input class="form-control" type="date" name="harvest_date[]" class="form-control" id="dob"  placeholder="Harvest Date"/></td>'+
        '<td><input class="form-control" type="text" name="comment[]" class="form-control" placeholder="Addln Comments"/></td>'+
        '<td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>'+
      '</tr>';

        $('tbody').append(tr);
});

$('tbody').on('click', '.deleteRow', function(){
    $(this).parent().parent().remove();
});

</script>
@endsection
