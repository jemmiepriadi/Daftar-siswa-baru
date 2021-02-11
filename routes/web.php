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

//get DATABASE data 
Route::get('/siswa','App\Http\Controllers\SiswaController@index');

//create DATABASE data with post
Route::post('/siswa/create','App\Http\Controllers\SiswaController@create');

//to edut page
Route::get('/siswa/{id}/edit','App\Http\Controllers\SiswaController@edit');

//get Student data by ID from DATABASE
Route::get('/siswa/{id}','App\Http\Controllers\SiswaController@getStudentById');

//delete student data by ID from DATABASE
Route::get('/siswa/{id}/delete','App\Http\Controllers\SiswaController@deleteData');

//update student data by ID from database
Route::post('/siswa/{id}/update','App\Http\Controllers\SiswaController@updateStudent');