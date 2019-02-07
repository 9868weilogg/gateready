<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','HomeController@index');

Route::resource('/home','HomeController');
Route::resource('/records','RecordsController');
Route::resource('/admins','AdminsController');

/**----------- gateready.com admin page edit status feature (for AJAX)----------------**/
Route::post('/admins/edit-status-ajax/{record_reference_number}', 'AdminsController@edit_status_ajax');

/**----------- gateready.com admin page filter tracking number feature (for AJAX)----------------**/
Route::post('/admins/filter-tracking-number-ajax', 'AdminsController@filter_tracking_number_ajax');


/**
**
**  REST API testing
**
**/
// Route::get('/records','RecordController@index');
