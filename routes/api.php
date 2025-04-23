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

    Route::get('blood_types', 'MainController@bloodTypes');

    Route::get('catigories', 'MainController@catigories');
    Route::get('articles', 'MainController@articles');


    //Route::post('register', 'AuthController@register');

    //>>>>>> using Laravel Sanctum <<<<<<<<<<<<<<<

    Route::post('/tokens/create', function (Request $request) {
        $token = $request->user()->createToken($request->token_name);

        return ['token' => $token->plainTextToken];
    });
    Route::post('register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');

 //Protected routes (require authentication)
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout',  'AuthController@logout');
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        Route::get('donation_requests', 'MainController@donationRequests');
    });




});

