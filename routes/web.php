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
    Route::delete('cursos/{course}/ativacao', 'CourseActivationController@destroy')->name('courses.deactivation')->middleware('collab');

    Route::get('colaboradores', 'CollaboratorController@index')->name('collaborators.index')->middleware('collab:admin');
    Route::get('colaboradores/cadastrar', 'CollaboratorController@create')->name('collaborators.create')->middleware('collab:admin');
    Route::post('colaboradores', 'CollaboratorController@store')->name('collaborators.store')->middleware('collab:admin');

    Route::get('cursos/{course}/conteudo', 'CourseContentController@index')->name('courses.content.index')->middleware('collab');
    Route::post('cursos/{course}/conteudo', 'CourseContentController@store')->name('courses.content.store')->middleware('collab');
    Route::patch('cursos/{course}/conteudo/{index}', 'CourseContentController@update')->name('courses.content.update')->middleware('collab');
    Route::delete('cursos/{course}/conteudo/{index}', 'CourseContentController@destroy')->name('courses.content.destroy')->middleware('collab');

    Route::get('cursos/{course}/vantagens', 'CourseAdvantagesController@index')->name('courses.advantages.index')->middleware('collab');
    Route::post('cursos/{course}/vantagens', 'CourseAdvantagesController@store')->name('courses.advantages.store')->middleware('collab');
    Route::patch('cursos/{course}/vantagens/{index}', 'CourseAdvantagesController@update')->name('courses.advantages.update')->middleware('collab');
    Route::delete('cursos/{course}/vantagens/{index}', 'CourseAdvantagesController@destroy')->name('courses.advantages.destroy')->middleware('collab');
});
