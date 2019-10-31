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

    // For User Routes
	
    Auth::routes();

    Route::group([
        'middleware' => 'auth'
    ], function () {

        include_once 'User/dashboard.php';        
    });

    // For Admin

    Route::get('/admin', 'Admin\AdminLoginController@login')->name('admin.auth.login');
    Route::post('/admin', 'Admin\AdminLoginController@loginAdmin')->name('admin.login.submit');

    Route::group([
        'prefix' => 'admin', 
        'middleware' => 'auth:admin'
    ], function() {

      include_once 'Admin/dashboard.php';

    });