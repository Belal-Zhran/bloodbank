<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|

 >>>>>>>>>>>>   All routes take "api/" as prefix    <<<<<<<<<<<<<<<<<


*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix'=>'v1', 'namespace'=> 'App\Http\Controllers\Api' ],function(){

    Route::get('governorates', 'MainController@governorates');
    Route::get('cities', 'MainController@cities');
});
