<?php

Route::group([
    'namespace' => '\User',
], function() {

       Route::get('/user-dashboard', 'UserController@index')
                        ->name('dashboard');
       Route::get('/user-alltasks' , 'UserController@allTaskList');
       Route::post('/user-taskadd', 'UserController@taskAdd');
       Route::get('/user-task-edit/{id}', 'UserController@editData');
       Route::post('/user-task-update/{id}', 'UserController@taskUpdate');
       Route::delete('/user-task-delete/{id}' , 'UserController@taskDelete');

       Route::get('/user-logout','UserController@logout')->name('user.logout');
});