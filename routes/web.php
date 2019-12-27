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
    Route::resource('/appointment','AppointmentController',['except'=>['create','show']]);
});
//Route::get('/appointment', 'AppointmentController@index')->name('hello')->middleware('svcmktg','auth');
//Route::post('/appointment','AppointmentController@app')->name('insert')->middleware('svcmktg','auth');
//Route::get('/appointment','AppointmentController@destroy')->name('panas')->middleware('svcmktg','auth');

Route::middleware('jobctrl','auth')->group(function(){
    Route::resource('/jobctrl','JobCtrlController',['except' => ['show','update','create','edit']]);
});

Route::get('haha', function(){
    return view('charan');
});

Route::get('listapp', 'ListAppController@index'); //call to get webview of list of appointments

Route::get('charan', 'QueuingController@export'); //NEED TO UPDATE to 'queue'

Route::get('checklist','ChecklistController@export');

Route::get('w1_tin','Workbay1Controller@tin'); //call to record time_in @ workbay 1 url:  http://192.168.0.18/w1_tin

Route::get('w1_tout1','Workbay1Controller@tout1'); //call to record first time_out @ wbay 1 url:  http://192.168.0.18/w1_tout1

Route::get('w1_tout2','Workbay1Controller@tout2'); //call to record 2nd time_out @ wbay 1 url:  http://192.168.0.18/w1_tout2


Route::get('w2_tin','Workbay2Controller@tin'); //call to record time_in @ workbay 1 url:  http://192.168.0.18/w2_tin

Route::get('w2_tout1','Workbay2Controller@tout1'); //call to record first time_out @ wbay 1 url:  http://192.168.0.18/w2_tout1

Route::get('w2_tout2','Workbay2Controller@tout2'); //call to record 2nd time_out @ wbay 1 url:  http://192.168.0.18/w2_tout2

//Test CONTROLLER

Route::get('expo','TestController@export');

Route::get('tout1','TestController@tout1');
Route::get('tout2','TestController@tout2');

Route::get('tin','TestController@tin');

Route::get('whoru','TestController@whois');

