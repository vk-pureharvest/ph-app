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

Route::resource('meter_readings','Meter_ReadingsController');

Route::resource('dimensions','DimensionsController');
 
Route::resource('brixs','BrixesController');

Route::resource('incidents','IncidentsController');

Route::get('/home', 'HomeController@index')->name('home');
