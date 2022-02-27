<?php


use App\Http\Controllers\BrixesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/multi-insert', [BrixesController::class, 'index'])->name('multi-insert');
//Route::get('/submitData', [BrixesController::class, 'submitData'])->name('submitData');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users','UsersController');

Route::resource('complaints','ComplaintsController');

Route::resource('fruit_measures','FruitMeasuresController');

Route::resource('productions','ProductionsController');

Route::resource('meter_readings','Meter_ReadingsController');

Route::resource('dimensions','DimensionsController');
 
Route::resource('brixs','BrixesController');

Route::resource('incidents','IncidentsController');

Route::resource('class2_prod','Class2_productionController');

Route::resource('pallet_tracker','Pallect_trackerController');

Route::resource('packingqc','PackingQCController');

Route::resource('shelflifetests','ShelfLifeTestController');

Route::resource('shelflifeberry','ShelfLifeBerryController');

Route::resource('cold_storage_temps','ColdStorageTempController');

Route::resource('nahel_utilities','NahelUtilityController');

Route::resource('alain_utilities','AlAinUtilityController');

Route::resource('inventories','InventoryController');

Route::resource('prod_export_xls','ProductionsController@exportProdExcel');

Route::resource('wtfile','UploadWtfileController');

Route::resource('weekly_harvest_forecasts','WeeklyHarvestController');

Route::resource('leafy_green_harvest','LeafyGreenHarvestedController');

Route::resource('leafy_green_package','LeafyGreenPackedController');

Route::resource('truck_trackers','TruckController');

Route::resource('leafy_closing_stock','Leafy_Closing_Stock_Controller');

Route::resource('truck_receipts','TruckReceiptController');

Route::resource('truck_temps','TruckTempController');

Route::resource('harvest_schedules','HarvestScheduleController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/uploadfile', 'UploadWtfileController@index');
Route::post('/uploadfile', 'UploadWtfileController@store');

Route::get('/production-excel','ProductionsController@exportProdExcel');
Route::get('/production-excel/exportProdExcel', 'ProductionsController@exportProdExcel')->name('production-excel.exportProdExcel');

Route::get('/complaint-excel','ComplaintsController@exportCompExcel');
Route::get('/complaint-excel/exportCompExcel', 'ComplaintsController@exportCompExcel')->name('complaint-excel.exportCompExcel');

Route::get('/fruitmeasures-excel','FruitMeasuresController@exportDimExcel');
Route::get('/fruitmeasures-excel/exportDimExcel', 'FruitMeasuresController@exportDimExcel')->name('fruitmeasures-excel.exportDimExcel');

Route::get('/incidents-excel','IncidentsController@exportIncidentExcel');
Route::get('/incidents-excel/exportIncidentExcel', 'IncidentsController@exportIncidentExcel')->name('incidents-excel.exportIncidentExcel');

Route::get('/pallet_tracker-excel','Pallect_trackerController@exportPalletExcel');
Route::get('/pallet_tracker-excel/exportPalletExcel', 'Pallect_trackerController@exportPalletExcel')->name('pallet_tracker-excel.exportPalletExcel');

Route::get('/class2_prod-excel','Class2_productionController@exportClass2ProdExcel');
Route::get('/class2_prod-excel/Class2_productionExport', 'Class2_productionController@exportClass2ProdExcel')->name('class2_prod-excel.exportClass2ProdExcel');

Route::get('/packingqc-excel','PackingQCController@exportPackingQCExcel');
Route::get('/packingqc-excel/PackingQCExport', 'PackingQCController@exportPackingQCExcel')->name('packingqc-excel.exportPackingQCExcel');

Route::get('/shelflifetests-excel','ShelfLifeTestController@exportShelfLifeTestExcel');
Route::get('/shelflifetests-excel/ShelfLifeTestExport', 'ShelfLifeTestController@exportShelfLifeTestExcel')->name('shelflifetests-excel.exportShelfLifeTestExcel');

Route::get('/shelflifeberry-excel','ShelfLifeBerryController@exportShelfLifeBerryExcel');
Route::get('/shelflifeberry-excel/ShelfLifeBerryExport', 'ShelfLifeBerryController@exportShelfLifeBerryExcel')->name('shelflifeberry-excel.exportShelfLifeBerryExcel');

Route::get('/inventory-excel','InventoryController@exportInventoryExcel');
Route::get('/inventory-excel/InventoryExport', 'InventoryController@exportInventoryExcel')->name('inventory-excel.exportInventoryExcel');

Route::get('/nahel_utitlies-excel','NahelUtilityController@exportInventoryExcel');
Route::get('/nahel_utitlies-excel/NahelUtilityExport', 'NahelUtilityController@exportNahel_UtilityExcel')->name('nahel_utitlies-excel.exportNahel_UtilityExcel');

Route::get('/alain_utitlies-excel','AlAinUtilityController@exportInventoryExcel');
Route::get('/alain_utitlies-excel/AlAinUtilityExport', 'AlAinUtilityController@exportAlAin_UtilityExcel')->name('alain_utitlies-excel.exportAlAin_UtilityExcel');

Route::get('/priva_prod-excel','UsersController@exportPrivaProdExcel');
Route::get('/priva_prod-excel/PrivaProductionExport', 'UsersController@exportPrivaProdExcel')->name('priva_prod-excel.exportPrivaProdExcel');

//Route::get('/production-csv','ProductionsController@exportProdCSV');
//Route::get('/production-csv/exportProdCSV', 'ProductionsController@exportProdCSV')->name('production-excel.exportProdCSV');


?>