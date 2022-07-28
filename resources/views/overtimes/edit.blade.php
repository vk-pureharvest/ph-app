
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
  <h3>Edit OT Hours</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('OvertimeController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Site Name</label>
      <select class="form-control w-25" id="selectCategory" name="site_name" required focus>
      <option value="{{$overtimes->site_name}}" selected="selected">{{$overtimes->site_name}}</option>
        <option value="Nahel">{{"Nahel"}}</option>    
        <option value="KSA">{{"KSA"}}</option>
      </select>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Date Added</label>
      <input class="form-control w-25"  type="date" name="date_added" class="form-control" id="dob" value="{{$overtimes->date_added}}"/>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Employee</label>
    <select class="form-control w-25" id="text" name="employee" required focus>
                <option value="{{$overtimes->employee}}" selected="selected">{{$overtimes->employee}}</option> 
      <option value="SSEMANDA . JULIUS">SSEMANDA . JULIUS</option>
      <option value="CHARLES OKUMU AVUNGANA">CHARLES OKUMU AVUNGANA</option>
      <option value="CORNEL AGUKO OGOLA">CORNEL AGUKO OGOLA</option>
      <option value="KIZZA . HAKIM">KIZZA . HAKIM</option>
      <option value="PETER GITHUA">PETER GITHUA</option>
      <option value="KELVINE OBWAYA RICHARD">KELVINE OBWAYA RICHARD</option>
      <option value="MUHEREZA . ELIJAH">MUHEREZA . ELIJAH</option>
      <option value="HASSAN NASSORO MZANDI">HASSAN NASSORO MZANDI</option>
      <option value="HUSSEIN HAMISI ABDALLAH">HUSSEIN HAMISI ABDALLAH</option>
      <option value="ESUTRE . GEORGE">ESUTRE . GEORGE</option>
      <option value="SEKANDI . KEVIN">SEKANDI . KEVIN</option>
      <option value="GODFREY MURIITHI KANGANGI">GODFREY MURIITHI KANGANGI</option>
      <option value="SSEMBUZZE HAKIM -">SSEMBUZZE HAKIM -</option>
      <option value="MATSIKO - RONALD">MATSIKO - RONALD</option>
      <option value="SIMON NDUNGU MUNI">SIMON NDUNGU MUNI</option>
      <option value="YUSUF AGWATA SAGWE">YUSUF AGWATA SAGWE</option>
      <option value="VICTOR AGUMONYO ALUSA">VICTOR AGUMONYO ALUSA</option>
      <option value="ALI JUMA MREKO">ALI JUMA MREKO</option>
      <option value="SSEMIYINGO SADIKI -">SSEMIYINGO SADIKI -</option>
      <option value="ALIKIRIZA JUMAH -">ALIKIRIZA JUMAH -</option>
      <option value="MAN BAHADUR BISHWAKARMA">MAN BAHADUR BISHWAKARMA</option>
      <option value="DHAN BAHADUR JOGI">DHAN BAHADUR JOGI</option>
      <option value="ANGIT . LO">ANGIT . LO</option>
      <option value="RAMESH BAHADUR JAGRI">RAMESH BAHADUR JAGRI</option>
      <option value="SAMBU . BK">SAMBU . BK</option>
      <option value="GOVIND MAJHI THARU">GOVIND MAJHI THARU</option>
      <option value="OM . BAHADUR BK">OM . BAHADUR BK</option>
      <option value="BHIM BAHADUR BK">BHIM BAHADUR BK</option>
      <option value="MANISULU - - BUGO">MANISULU - - BUGO</option>
      <option value="Eria sunday">Eria sunday</option>
      <option value="Wilson ojwang">Wilson ojwang</option>
      <option value="Gilbert kiiza">Gilbert kiiza</option>
      <option value="HUZAIFA  ZIJJA">HUZAIFA  ZIJJA</option>
      <option value="ANDREW  KATWESIGE">ANDREW  KATWESIGE</option>
      <option value="SOLOMON WAWALA">SOLOMON WAWALA</option>
      <option value="MARTIN TUSINGWIRE">MARTIN TUSINGWIRE</option>
      <option value="ERICKSON NDYABAHIKA">ERICKSON NDYABAHIKA</option>
      <option value="ASHIRAF JAGWE">ASHIRAF JAGWE</option>
      <option value="JAFEER NASSIR JAFEER">JAFEER NASSIR JAFEER</option>
      <option value="IVAN ERWAINE">IVAN ERWAINE</option>
      <option value="ARNOLD LUCAS KINTU">ARNOLD LUCAS KINTU</option>
      <option value="OMAR JAFER BAKARI">OMAR JAFER BAKARI</option>
      <option value="MALIK  MOHAMMED">MALIK  MOHAMMED</option>
      <option value="DENIS  MATOVU">DENIS  MATOVU</option>
      <option value="MOSES WAKABA NJERI">MOSES WAKABA NJERI</option>
      <option value="ZUBERI SWALEH OMARI">ZUBERI SWALEH OMARI</option>
      <option value="BASHIR SULEIMAN EBRAHIM">BASHIR SULEIMAN EBRAHIM</option>
      <option value="KIBWANA RASHID SALIM">KIBWANA RASHID SALIM</option>
      <option value="MARWAN FUAD ALI">MARWAN FUAD ALI</option>
      <option value="ALI  MURILO">ALI  MURILO</option>
      <option value="KELVIN THEURI MURUTHI">KELVIN THEURI MURUTHI</option>
      <option value="RONALD  KABUYE">RONALD  KABUYE</option>
      <option value="MUHAMADI . KIGGUNDU">MUHAMADI . KIGGUNDU</option>
      <option value="KASSIM MALALA OMWITAKHO">KASSIM MALALA OMWITAKHO</option>
      <option value="PETER KURIA NJERI">PETER KURIA NJERI</option>
      <option value="IS-HAK MOHAMED HAMUDI">IS-HAK MOHAMED HAMUDI</option>
      <option value="GIDEON JOEL NGOBI">GIDEON JOEL NGOBI</option>
      <option value="JAMES OTIENO ODIAGA">JAMES OTIENO ODIAGA</option>
      <option value="THOMAS MATHUKU MUTUKU">THOMAS MATHUKU MUTUKU</option>
      <option value="Montari Boaz">Montari Boaz</option>
      <option value="Tukole jamil">Tukole jamil</option>
      <option value="Kayanga Bashir">Kayanga Bashir</option>
      <option value="Evarist Nimusiima">Evarist Nimusiima</option>
      <option value="ABDULKADIR MWICHANDE ABDI">ABDULKADIR MWICHANDE ABDI</option>
      <option value="Abu Baker Adam">Abu Baker Adam</option>
      <option value="AKRAM SSESANGA">AKRAM SSESANGA</option>
      <option value="ANDREW . KITYO">ANDREW . KITYO</option>
      <option value="ATRASH ZUBER MOHAMED">ATRASH ZUBER MOHAMED</option>
      <option value="DANIEL DENGE KARISA">DANIEL DENGE KARISA</option>
      <option value="DANIEL MUCHIRA KINYUA">DANIEL MUCHIRA KINYUA</option>
      <option value="DAVID DANIEL SEBULIBA">DAVID DANIEL SEBULIBA</option>
      <option value="DOMINIC NJUGUNA KARANJA">DOMINIC NJUGUNA KARANJA</option>
      <option value="ERIA . MPOYA">ERIA . MPOYA</option>
      <option value="FRANCIS . TUDEKA">FRANCIS . TUDEKA</option>
      <option value="FRANCIS WANDERI MAINA">FRANCIS WANDERI MAINA</option>
      <option value="FRANCISCO TAMALE">FRANCISCO TAMALE</option>
      <option value="GEOFREY MULUMBA BUYINZA">GEOFREY MULUMBA BUYINZA</option>
      <option value="HAIDARA ATHMAN KIRAO">HAIDARA ATHMAN KIRAO</option>
      <option value="HENRY NDUNGU MWITURIA">HENRY NDUNGU MWITURIA</option>
      <option value="ISRAEL TOM KIRU">ISRAEL TOM KIRU</option>
      <option value="IVAN . TULINAWE">IVAN . TULINAWE</option>
      <option value="JAMES WAWERU MWANGI">JAMES WAWERU MWANGI</option>
      <option value="LOKENDRA BAHADOUR MAHAT">LOKENDRA BAHADOUR MAHAT</option>
      <option value="MANISULU KIMERA">MANISULU KIMERA</option>
      <option value="MARTIN MBUGUA KAGOKO">MARTIN MBUGUA KAGOKO</option>
      <option value="MBARAK HUSSEIN MBARAK">MBARAK HUSSEIN MBARAK</option>
      <option value="MICHAEL ABALLA OBALLA">MICHAEL ABALLA OBALLA</option>
      <option value="MOSES AMANI THOMAS">MOSES AMANI THOMAS</option>
      <option value="MULISHID . WANGI">MULISHID . WANGI</option>
      <option value="NDAULA HAMIDU">NDAULA HAMIDU</option>
      <option value="NSUBUGA REAGAN">NSUBUGA REAGAN</option>
      <option value="PAUL KAMAU MIGWI">PAUL KAMAU MIGWI</option>
      <option value="RAMA JUMA MOHAMED">RAMA JUMA MOHAMED</option>
      <option value="RAPHAEL GITURU NDEGWA">RAPHAEL GITURU NDEGWA</option>
      <option value="SAMUEL MURITHI WARINGA">SAMUEL MURITHI WARINGA</option>
      <option value="SHURUTI RIDHA HEMED">SHURUTI RIDHA HEMED</option>
      <option value="SULEIMAN DENA MWALIMU">SULEIMAN DENA MWALIMU</option>
      <option value="ZACHARIA KARIUKI KAMAU">ZACHARIA KARIUKI KAMAU</option>
      <option value="Mohammad Shakil">Mohammad Shakil</option>
<option value="Lamin Kamara">Lamin Kamara</option>
<option value="Sunday">Sunday</option>
<option value="Pricilla">Pricilla</option>
<option value="Sochan">Sochan</option>
<option value="Mohammad Younus">Mohammad Younus</option>
<option value="Alice Nyambura">Alice Nyambura</option>
<option value="Ajegenjang Mathias Egyawan">Ajegenjang Mathias Egyawan</option>
<option value="Paul  Ndoko ">Paul  Ndoko </option>
<option value="Stephen  Takyi">Stephen  Takyi</option>
<option value="Bilal Yasin">Bilal Yasin</option>
<option value="Hope  Otebor">Hope  Otebor</option>
<option value="Mohammed Kuzaru Dalawi">Mohammed Kuzaru Dalawi</option>
<option value="Abravi Dedekpokpo Ataglinyi Epse Aguda">Abravi Dedekpokpo Ataglinyi Epse Aguda</option>
<option value="Larydianshevette Arrey">Larydianshevette Arrey</option>
<option value="Blandin Yufenyuy">Blandin Yufenyuy</option>
<option value="Djariatou Daki">Djariatou Daki</option>
   </select>
  </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Reason</label>
    <select class="form-control w-25" id="text" name="reason" required focus>
                <option value="{{$overtimes->reason}}" selected="selected">{{$overtimes->reason}}</option>  
                <option value="Excess orders">Excess orders</option>
        <option value="Quality issues">Quality issues</option>
        <option value="Shortage of labour">Shortage of labour</option>
        <option value="Cleaning">Cleaning</option>
        <option value="Admin work">Admin work</option>
        <option value="Others">Others</option>
   </select>
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Hours Requested</label>
    <input class="form-control w-25" type="decimal" name="ot_requested" class="form-control" value="{{$overtimes->ot_requested}}" />
   </div>
   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Hours Granted</label>
    <input class="form-control w-25" type="decimal" name="ot_granted" class="form-control" value="{{$overtimes->ot_granted}}" />
   </div>  

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Comments</label>
      <input class="form-control w-25"  type="text" name="comment" class="form-control" id="dob" value="{{$overtimes->comment}}"/>
  </div>
   <br />
   <div class="form-group">
    <input style="position: relative; left: 250px" type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>


@endsection