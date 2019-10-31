<?php

Route::group([
    'namespace' => '\Admin',
], function() {

       Route::get('/dashboard', 'AdminController@adminIndex')
                        ->name('admin.dashboard');
       Route::get('/alltasks' , 'AdminController@allTaskList');
       Route::post('/taskadd', 'AdminController@taskAdd');
       Route::get('/task-edit/{id}', 'AdminController@editData');
       Route::post('/task-update/{id}', 'AdminController@taskUpdate');
       Route::delete('/task-delete/{id}' , 'AdminController@taskDelete');

       Route::get('/logout','AdminController@AdminLogout')->name('admin.logout');
      
      
});