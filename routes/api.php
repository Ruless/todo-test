<?php

use Illuminate\Http\Request;

Route::prefix('/tasks')->group(function () {
    Route::get('list', 'App\Http\Controllers\TaskController@getTaskList');
    Route::post('create', 'App\Http\Controllers\TaskController@create');
    Route::put('{id}/complite', 'App\Http\Controllers\TaskController@complite');
    Route::delete('{id}/delete', 'App\Http\Controllers\TaskController@deleteTask');
});
