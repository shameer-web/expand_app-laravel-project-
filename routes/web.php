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

Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');


// Route::group(['middleware' =>['auth','admin']],function(){

Route::group(array('middleware' => 'auth','middleware' => 'admin','prefix'=>'admin','namespace'=>'Admin'), function()
{  

    Route::get('/', 'AdminController@index');
    // Route::get('/enquiery/create', 'EnquiryController@create');
    // Route::get('/enquiery/index', 'EnquiryController@index')->name('index');
    
    Route::resource('user','UserController');
    // Route::resource('enquiery','EnquieryController');
    
    Route::resource('package','PackageController');
    Route::resource('device','DeviceController');
    Route::resource('customer','CustomerController');


     Route::resource('type','TypeController');
     // Route::resource('model','ModelController');
     Route::resource('company','CompanyController');
     Route::resource('loc','LocController');
     Route::resource('district','DistrictController');
      Route::resource('models','ModelsController');




//enquiry 
    Route::get('/enquiry','EnquiryController@index')->name('enquiry.index');
    Route::get('/enquiry/create','EnquiryController@create')->name('enquiry.create');
    Route::post('/enquiry/create','EnquiryController@store')->name('enquiry.store');
    Route::get('/enquiry/{id}/edit','EnquiryController@edit')->name('enquiry.edit');
    Route::put('/enquiry/{id}/update','EnquiryController@update')->name('enquiry.update');
//end enquiry 

//customer route start here
    Route::get('/customer/create', 'CustomerController@create')->name('customer.create');
//customer route end here
});


Route::group(array('middleware' => 'auth','middleware' => 'admin','prefix'=>'staff','namespace'=>'Staff'), function()
{  


   

    Route::get('/', 'StaffController@index');

    

    

    

     
     
});
