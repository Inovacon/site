<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('comprar', 'Payment\PaymentControllerInterface@store');

Route::get('/', 'PagesController@index')->name('home');

Route::get('cursos', 'CourseController@index')->name('courses.index');
Route::get('cursos/{activeCourse}', 'CourseController@show')->name('courses.show');

Route::get('eventos', 'EventController@index')->name('events.index');
Route::get('eventos/{evento}', 'EventController@show')->name('events.show');

Route::get('noticias', 'NewsController@index')->name('news.index');
Route::get('noticias/{noticia}', 'NewsController@show')->name('news.show');

Route::prefix('painel')->name('dashboard.')->namespace('Admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('index')->middleware('collab');

    Route::prefix('cursos')->name('courses.')->middleware('collab')->group(function () {
        Route::get('/', 'CourseController@index')->name('index');
        Route::get('cadastrar', 'CourseController@create')->name('create');
        Route::get('{course}', 'CourseController@show')->name('show');
        Route::post('/', 'CourseController@store')->name('store');
        Route::get('{course}/editar', 'CourseController@edit')->name('edit');
        Route::patch('{course}', 'CourseController@update')->name('update');

        Route::post('{course}/ativacao', 'CourseActivationController@store')->name('activation');
        Route::delete('{course}/ativacao', 'CourseActivationController@destroy')->name('deactivation');

        Route::get('{course}/conteudo', 'CourseContentController@index')->name('content.index');
        Route::post('{course}/conteudo', 'CourseContentController@store')->name('content.store');
        Route::patch('{course}/conteudo/{index}', 'CourseContentController@update')->name('content.update');
        Route::delete('{course}/conteudo/{index}', 'CourseContentController@destroy')->name('content.destroy');

        Route::get('{course}/vantagens', 'CourseAdvantagesController@index')->name('advantages.index');
        Route::post('{course}/vantagens', 'CourseAdvantagesController@store')->name('advantages.store');
        Route::patch('{course}/vantagens/{index}', 'CourseAdvantagesController@update')->name('advantages.update');
        Route::delete('{course}/vantagens/{index}', 'CourseAdvantagesController@destroy')->name('advantages.destroy');
    });

    Route::prefix('colaboradores')->name('collaborators.')->middleware('collab:admin')->group(function () {
        Route::get('/', 'CollaboratorController@index')->name('index');
        Route::get('cadastrar', 'CollaboratorController@create')->name('create');
        Route::post('/', 'CollaboratorController@store')->name('store');
    });
});
