<?php

use Illuminate\Support\Facades\Route;

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
    return view('create_record');
});
Route::resource('sample_record', 'SampleRecordController');
Route::resource('records', 'SampleViewController');
Route::post('remark', 'SampleRecordController@update');
