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

//Passport::routes();

Route::get('/home', 'HomeController@index')->middleware('auth')->name('homee');

Route::get('/backup','HomeController@bckup')->middleware('auth','can:manage-users');

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
    Route::resource('/jobctrl','JobCtrlController',['except' => ['show','create','edit','destroy','update']]);
    Route::get('/jobctrl/{jobctrl}','JobCtrlController@checkout')->name('jobctrl.checkout');
    Route::get('/jobctrl/get/{plate_no}','JobCtrlController@comp');
    Route::get('/tech','JobCtrlController@comptek');
});

Route::get('haha', function(){
    return view('charan');
});

//DROPDWON FOR QUEUING
Route::get('listapp', 'ListAppController@plate'); //call to get webview of list of appointments

Route::get('date', 'ListAppController@dates');

Route::get('queue', 'QueuingController@export');

Route::get('checklist','ChecklistController@export');

Route::get('comment','ChecklistController@comment');

//DROPDOWN FOR CHECKLIST
Route::get('plate_no','ChecklistController@plate');


Route::get('cust_name','ChecklistController@cust_name');

Route::get('engine_no','ChecklistController@engine_no');

Route::get('model','ChecklistController@mdl');

Route::get('color','ChecklistController@color');


//JOB CONTROLL DROPDOWN
//Route::get('/tech','JobCtrlController@comptek');'
//Route::get('/jobctrl/tech','JobCtrlController@comptek');



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

//Route::get('/backup','TestController@test')->name('test');
//DASHBOARD

Route::get('/overview', 'HomeController@index2')->name('dashb')->middleware('can:show-dash','auth');

Route::get('unres','DashboardController@ttlveh'); // units received
Route::get('uncom','DashboardController@ttlcom'); // units completed
Route::get('unrel','DashboardController@ttlrel'); // units released


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

