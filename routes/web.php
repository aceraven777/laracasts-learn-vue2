<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('projects/create', 'ProjectController@create');
Route::post('projects', 'ProjectController@store');