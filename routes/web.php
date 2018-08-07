<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'PagesController@index')->name('home');

Route::get('cursos', 'CourseController@index')->name('courses.index');
Route::get('cursos/{course}', 'CourseController@show')->name('courses.show');

Route::get('eventos', 'EventController@index')->name('events.index');
Route::get('eventos/{evento}', 'EventController@show')->name('events.show');

Route::get('noticias', 'NewsController@index')->name('news.index');
Route::get('noticias/{noticia}', 'NewsController@show')->name('news.show');

Route::prefix('painel')->namespace('Admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index')->middleware('collaborator');

    Route::get('cursos', 'CourseController@index')->name('dashboard.courses.index')->middleware('collaborator');
    Route::get('cursos/cadastrar', 'CourseController@create')->name('courses.create')->middleware('collaborator');
    Route::get('cursos/{course}', 'CourseController@show')->name('dashboard.courses.show')->middleware('collaborator');
    Route::post('cursos', 'CourseController@store')->name('courses.store')->middleware('collaborator');
    Route::get('cursos/{course}/editar', 'CourseController@edit')->name('courses.edit')->middleware('collaborator');
    Route::patch('cursos/{course}', 'CourseController@update')->name('courses.update')->middleware('collaborator');

    Route::post('cursos/{course}/ativacao', 'CourseActivationController@store')->name('dashboard.courses.activation')->middleware('collaborator');
    Route::delete('cursos/{course}/ativacao', 'CourseActivationController@destroy')->middleware('collaborator');
});
