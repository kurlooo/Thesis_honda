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

Route::get('/home', 'HomeController@index')->middleware('auth');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show','create','store']]);
});

//Route::get('/overview', function (){
//    return view('pages.admin');
//})->middleware('admin','auth');

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

Route::get('queue', 'QueuingController@export'); //NEED TO UPDATE to 'queue'

Route::get('checklist','ChecklistController@export');

Route::get('comment','ChecklistController@comment');

Route::get('whois','ChecklistController@dropdown');


//WORKBAY 1
Route::get('w1_tin1','Workbay1Controller@tin1'); //call to record first time_in @ workbay 1 url:  http://192.168.0.18/w1_tin1

Route::get('w1_tin2','Workbay1Controller@tin2'); //call to record 2nd time_in @ workbay 1 url:  http://192.168.0.18/w1_tin2

Route::get('w1_tout1','Workbay1Controller@tout1'); //call to record first time_out @ wbay 1 url:  http://192.168.0.18/w1_tout1

Route::get('w1_tout2','Workbay1Controller@tout2'); //call to record 2nd time_out @ wbay 1 url:  http://192.168.0.18/w1_tout2

Route::get('whoru','Workbay1Controller@whois2');

//WORKBAY 2
Route::get('w2_tin1','Workbay2Controller@tin1'); //call to record first time_in @ workbay 2 url:  http://192.168.0.18/w2_tin1

Route::get('w2_tin2','Workbay2Controller@tin2'); //call to record 2nd time_in @ workbay 2 url:  http://192.168.0.18/w2_tin2

Route::get('w2_tout1','Workbay2Controller@tout1'); //call to record first time_out @ wbay 1 url:  http://192.168.0.18/w2_tout1

Route::get('w2_tout2','Workbay2Controller@tout2'); //call to record 2nd time_out @ wbay 1 url:  http://192.168.0.18/w2_tout2

//Test CONTROLLER

Route::get('expo','TestController@expo');

Route::get('tout1','TestController@tout1');
Route::get('tout2','TestController@tout2');

Route::get('tin','TestController@tin');

//Route::get('whoru','TestController@dropdown');



//DASHBOARD

Route::get('/overview', 'HomeController@index2')->name('dashb')->middleware('can:manage-users','auth','admin');
//
//Route::group(['middleware' => 'auth'], function () {
//	Route::get('table-list', function () {
//		return view('pages.table_list');
//	})->name('table');
//
//	Route::get('typography', function () {
//		return view('pages.typography');
//	})->name('typography');
//
//	Route::get('icons', function () {
//		return view('pages.icons');
//	})->name('icons');
//
//	Route::get('map', function () {
//		return view('pages.map');
//	})->name('map');
//
//	Route::get('notifications', function () {
//		return view('pages.notifications');
//	})->name('notifications');
//
//	Route::get('rtl-support', function () {
//		return view('pages.language');
//	})->name('language');
//
//	Route::get('upgrade', function () {
//		return view('pages.upgrade');
//	})->name('upgrade');
//});
//
//Route::group(['middleware' => 'auth'], function () {
//	Route::resource('user', 'UserController', ['except' => ['show']]);
//	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
//	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
//	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
//});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

