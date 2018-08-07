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

Route::prefix('painel')->name('dashboard.')->namespace('Admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('index')->middleware('collab');

    Route::get('cursos', 'CourseController@index')->name('courses.index')->middleware('collab');
    Route::get('cursos/cadastrar', 'CourseController@create')->name('courses.create')->middleware('collab');
    Route::get('cursos/{course}', 'CourseController@show')->name('courses.show')->middleware('collab');
    Route::post('cursos', 'CourseController@store')->name('courses.store')->middleware('collab');
    Route::get('cursos/{course}/editar', 'CourseController@edit')->name('courses.edit')->middleware('collab');
    Route::patch('cursos/{course}', 'CourseController@update')->name('courses.update')->middleware('collab');

    Route::post('cursos/{course}/ativacao', 'CourseActivationController@store')->name('courses.activation')->middleware('collab');
    Route::delete('cursos/{course}/ativacao', 'CourseActivationController@destroy')->middleware('collab');
});
