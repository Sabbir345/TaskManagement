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
    // Route::get('/' , 'User\UserController@index')->name('user.login');
    // Route::post('/' , 'User\UserController@Login')->name('user.login.confirm');

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

        Route::get('task-created', function(){
            \App\Task::create(['name'=>'test 2', 'price'=>100]);
            dd('Task created successfully.');
        });

        Route::get('task-created-updated', function(){
            \App\Task::find(1)->update(['name'=>'test 3', 'price'=>100]);
            dd('Task updated successfully.');
        });

        Route::get('task-deleted', function(){
            \App\Task::find(1)->delete();
            dd('Task deleted successfully.');
        });
