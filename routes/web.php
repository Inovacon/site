<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'PagesController@index');

Route::get('home', 'HomeController@index')->name('home');

Route::get('cursos', 'CourseController@index')->name('courses.index');
Route::get('cursos/{course}', 'CourseController@show')->name('courses.show');

Route::get('eventos', 'EventController@index')->name('events.index');

Route::get('noticias', 'NewsController@index')->name('news.index');
