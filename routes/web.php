<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'PagesController@index');

Route::get('home', 'HomeController@index')->name('home');

Route::get('cursos', 'CourseController@index')->name('courses.index');
Route::post('cursos', 'CourseController@store')->name('courses.store')->middleware('admin');
Route::get('cursos/criar', 'CourseController@create')->name('courses.create')->middleware('admin');
Route::get('cursos/{course}', 'CourseController@show')->name('courses.show');
Route::get('cursos/{course}/editar', 'CourseController@edit')->name('courses.edit')->middleware('admin');
Route::patch('cursos/{course}', 'CourseController@update')->name('courses.update')->middleware('admin');

Route::get('eventos', 'EventController@index');

Route::get('noticias', 'NewsController@index');