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
Route::get('/requirement/{id}', 'HomeController@requirement')->name('home');
Route::get('files', 'FilesController@store');
Route::get('file/{id}', 'FilesController@download')->name('file');


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
   
    Route::resource('requirement', 'RequirementController',['except' => ['show', 'destroy']]);
    Route::get('/requirement/search/{name}', 'RequirementController@search');
    Route::resource('filetype', 'FileTypeController', ['except' => ['index', 'create', 'show', 'destroy']]);

    Route::resource('customer', 'CustomerController',['except' => ['show', 'destroy']]);
    Route::get('/customer/search/{name}', 'CustomerController@search');
    Route::resource('process', 'ProcessController',['except' => ['index', 'create', 'show', 'destroy', 'update']]);
    Route::get('/mail', 'ProcessController@mail')->name('process.mail');
    Route::resource('files', 'FilesController',['only' => ['store']]);
    Route::get('/file/{id}', 'FilesController@adminDownload')->name('admin.file');

});