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
    return view('welcome');
});
Route::get('/data', function () {
    return view('data');
});
Route::post('/Register','App\Http\Controllers\UserController@Register');
Route::post('/LogIn','App\Http\Controllers\UserController@LogIn');
Route::post('/UploadData','App\Http\Controllers\UserController@UploadData');
Route::post('/getData','App\Http\Controllers\UserController@getData');