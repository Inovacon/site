<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'PagesController@index')->name('home');

Route::get('cursos', 'CourseController@index')->name('courses.index');
Route::get('cursos/{course}', 'CourseController@show')->name('courses.show');

Route::get('eventos', 'EventController@index')->name('events.index');

Route::get('noticias', 'NewsController@index')->name('news.index');

Route::prefix('painel')->namespace('Admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    Route::get('cursos/criar', 'CourseController@create')->name('courses.create')->middleware('collaborator');
    Route::post('cursos', 'CourseController@store')->name('courses.store')->middleware('collaborator');
});
