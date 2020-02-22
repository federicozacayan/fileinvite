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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('admin')->group(function () {
    
    Route::get('/login', 'AdministratorController@showLoginForm');
    Route::post('/login', 'AdministratorController@login')->name('admin.login');
    Route::get('/area', 'DashBoard@secret')->name('admin.area');
    Route::get('/logout', 'AdministratorController@logout')->name('admin.logout');

    Route::get('/register', 'AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'AdminRegisterController@register');

    Route::get('/password/reset','AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email','AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

    Route::get('/password/reset/{token}','AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset','AdminResetPasswordController@reset')->name('admin.password.update');

    // Route::get('/requirement', 'RequirementController@index');
    // Route::post('/requirement/form', 'RequirementController@store');
    
    Route::resource('requirement', 'RequirementController');
    Route::get('/requirement/search/{name}', 'RequirementController@search');
    Route::resource('filetype', 'FileTypeController');
    Route::resource('customer', 'CustomerController');
    Route::get('/customer/search/{name}', 'CustomerController@search');
    Route::resource('process', 'ProcessController');

});