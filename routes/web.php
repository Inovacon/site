<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/selecao-de-turma', function() {
    return view('courses._team-selection');
})->name('selecao-de-turma');

Route::get('/', 'PagesController@index')->name('home');

Route::get('cursos', 'CourseController@index')->name('courses.index');
Route::get('cursos/{activeCourse}', 'CourseController@show')->name('courses.show');

Route::get('eventos', 'EventController@index')->name('events.index');
Route::get('eventos/{evento}', 'EventController@show')->name('events.show');

Route::get('noticias', 'NewsController@index')->name('news.index');
Route::get('noticias/{noticia}', 'NewsController@show')->name('news.show');

Route::prefix('painel')->name('dashboard.')->namespace('Admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('index')->middleware('collaborator');

    Route::prefix('cursos')->name('courses.')->middleware('collaborator')->group(function () {
        Route::get('/', 'CourseController@index')->name('index');
        Route::get('cadastrar', 'CourseController@create')->name('create');
        Route::get('{course}', 'CourseController@show')->name('show');
        Route::post('/', 'CourseController@store')->name('store');
        Route::get('{course}/editar', 'CourseController@edit')->name('edit');
        Route::patch('{course}', 'CourseController@update')->name('update');

        Route::post('{course}/ativacao', 'CourseActivationController@store')->name('activation');
        Route::delete('{course}/ativacao', 'CourseActivationController@destroy')->name('deactivation');

        Route::prefix('{course}/conteudo')->name('content.')->group(function () {
            Route::get('/', 'CourseContentController@index')->name('index');
            Route::post('/', 'CourseContentController@store')->name('store');
            Route::patch('{index}', 'CourseContentController@update')->name('update');
            Route::delete('{index}', 'CourseContentController@destroy')->name('destroy');
        });

        Route::prefix('{course}/vantagens')->name('advantages.')->group(function () {
            Route::get('/', 'CourseAdvantagesController@index')->name('index');
            Route::post('/', 'CourseAdvantagesController@store')->name('store');
            Route::patch('{index}', 'CourseAdvantagesController@update')->name('update');
            Route::delete('{index}', 'CourseAdvantagesController@destroy')->name('destroy');
        });

        Route::prefix('{course}/turmas')->name('teams.')->group(function () {
            Route::get('/', 'TeamController@index')->name('index');
            Route::get('cadastrar', 'TeamController@create')->name('create');
            Route::get('{team}', 'TeamController@show')->name('show');
            Route::post('/', 'TeamController@store')->name('store');
            Route::get('{team}/editar', 'TeamController@edit')->name('edit');
            Route::patch('{team}', 'TeamController@update')->name('update');
        });

        Route::prefix('turmas/{team}/aulas')->name('lessons.')->group(function () {
            Route::get('/', 'LessonController@index')->name('index');
            Route::get('cadastrar', 'LessonController@create')->name('create');
            Route::get('{lesson}', 'LessonController@show')->name('show');
            Route::post('/', 'LessonController@store')->name('store');
            Route::get('{lesson}/editar', 'LessonController@edit')->name('edit');
            Route::patch('{lesson}', 'LessonController@update')->name('update');
            Route::delete('{lesson}', 'LessonController@destroy')->name('destroy');
        });

        Route::post('turmas/{team}/cronograma', 'ScheduleController')->name('schedules.store');
    });

    Route::prefix('colaboradores')->name('collaborators.')->middleware('collaborator:admin')->group(function () {
        Route::get('/', 'CollaboratorController@index')->name('index');
        Route::get('cadastrar', 'CollaboratorController@create')->name('create');
        Route::post('/', 'CollaboratorController@store')->name('store');
    });
});
