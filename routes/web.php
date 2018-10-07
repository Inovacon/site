<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'PagesController@index')->name('home');

Route::get('cursos', 'CourseController@index')->name('courses.index');
Route::get('cursos/{activeCourse}', 'CourseController@show')->name('courses.show');

Route::middleware('auth')->group(function () {
    Route::get('minha-conta', function() {
        return view('user.index');
    })->name('my-account.index');

    Route::get('meus-cursos', function() {
        return view('user.my-courses.index');
    })->name('my-courses.index');

    Route::get('meus-cursos/nome-do-curso', function() {
    	$course = App\Course::first();
    	$team = App\Team::where('course_id', $course->id)->first();
    	$lessons = App\Lesson::where('team_id', $team->id)->get();

        return view('user.my-courses.show', compact('course', 'lessons'));
    })->name('my-courses.show');

    Route::get('minha-conta/alterar-dados', function() {
        $user = Auth::user();

        return view('user.my-account.edit', compact('user'));
    })->name('my-account.edit');

    Route::get('cursos/{activeCourse}/selecionar-turma', 'TeamController@index')->name('teams.index');
    Route::get('turmas/{team}/comprar-curso', 'TeamController@buyCourse')->name('teams.buy-course');

    Route::get('pedido-finalizado/sucesso', 'OrderCompletedController@success')->name('order-completed.success');
    Route::get('pedido-finalizado/falha', 'OrderCompletedController@failure')->name('order-completed.failure');
    Route::get('pedido-finalizado/pendente', 'OrderCompletedController@pending')->name('order-completed.pending');
});

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

    Route::prefix('noticias')->name('news.')->middleware('collaborator')->group(function () {
        Route::get('/', 'NewsController@index')->name('index');
        Route::get('cadastrar', 'NewsController@create')->name('create');
        Route::get('{noticia}', 'NewsController@show')->name('show');
        Route::post('/', 'NewsController@store')->name('store');
        Route::get('{noticia}/editar', 'NewsController@edit')->name('edit');
        Route::patch('{noticia}', 'NewsController@update')->name('update');
        Route::delete('{noticia}', 'NewsController@destroy')->name('destroy');
    });
});
