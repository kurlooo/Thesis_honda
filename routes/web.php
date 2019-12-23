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
    return view('pages.admin');
})->middleware('admin','auth');

//Route::get('/appointment', function (){
//    return view('pages.svcmktg');
//})->middleware('svcmktg','auth');

//Route::middleware('svcmktg','auth')->group( function() {
//    Route::get('/appointment', 'AppointmentController@index')->name('hello');
//    Route::post('/appointment','AppointmentController@app')->name('insert');
//    Route::post('/appointment','AppointmentController@delete')->name('panas');
//});
Route::middleware('svcmktg','auth')->group(function(){
    Route::resource('/appointment','AppointmentController');
});
//Route::get('/appointment', 'AppointmentController@index')->name('hello')->middleware('svcmktg','auth');
//Route::post('/appointment','AppointmentController@app')->name('insert')->middleware('svcmktg','auth');
//Route::get('/appointment','AppointmentController@destroy')->name('panas')->middleware('svcmktg','auth');

Route::get('/jobctrlsheet', function (){
    return view('pages.jobctrl');
})->middleware('jobctrl','auth');

Route::get('haha', function(){
    return view('charan');
});

Route::get('listapp', 'ListAppController@index');

Route::get('charan', 'QueuingController@export');

Route::get('checklist','ChecklistController@export');
