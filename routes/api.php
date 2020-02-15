<?php

use Illuminate\Http\Request;

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

//Route::middleware('scopes:android')->group(function () {
    Route::post('login', 'Api\Auth\LoginController@login');
    Route::post('refresh', 'Api\Auth\LoginController@refresh');
//});


//Route::middleware('auth:api')->group('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:api')->group(function () {
    Route::post('logout','Api\Auth\LoginController@logout');
});

Route::get('/status', function (){
    return ['status' => 'ok'];
});
