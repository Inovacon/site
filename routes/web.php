<?php

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('cursos')->name('courses.')->group(function () {
    Route::get('/', 'CourseController@index');
    Route::get('/show', 'CourseController@show');
    Route::post('/', 'CourseController@store')->name('store')->middleware('admin');
});

Route::get('eventos', 'EventController@index');
Route::get('noticias', 'NewsController@index');
