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


Route::get('/', function () {
    return view('home');
})->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show','create','store']]);
});

Route::get('/overview', function (){
    return view('admin');
})->name('admin')->middleware('checkrole');

Route::get('/appointment', function (){
    return view('svcmktg');
})->middleware('checkrole');

Route::get('/jobctrlsheet', function (){
    return view('jobctrl');
})->middleware('checkrole');
