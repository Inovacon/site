<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('cursos')->name('courses.')->group(function () {
    Route::post('/', 'CourseController@store')->name('store')->middleware('admin');
});
