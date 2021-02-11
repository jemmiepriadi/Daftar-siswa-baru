<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//get request
Route::get('siswa','App\Http\Controllers\ApiSiswaController@getlist');

//update API data by ID
Route::put('siswa/{id}','App\Http\Controllers\ApiSiswaController@updateStudent');

//get API data by ID
Route::get('siswa/{id}','App\Http\Controllers\ApiSiswaController@getStudentById');

//Post API data by ID
Route::post('api/siswa/create','App\Http\Controllers\ApiSiswaController@createdataApi');

//delete API data by ID
Route::delete('siswa/{id}','App\Http\Controllers\ApiSiswaController@deleteDatabyAPI');