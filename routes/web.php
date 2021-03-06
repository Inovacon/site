<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'PagesController@index')->name('home');

Route::get('cursos', 'CourseController@index')->name('courses.index');
Route::get('cursos/{activeCourse}', 'CourseController@show')->name('courses.show');

Route::middleware('auth')->group(function () {
    Route::prefix('minha-conta')->name('my-account.')->namespace('User')->group(function() {
        Route::get('/', 'MyAccountController@index')->name('user.index');
        Route::get('/alterar-dados', 'MyAccountController@edit')->name('user.edit');
        Route::patch('/alterar-dados', 'MyAccountController@update')->name('user.update');

        Route::get('/cursos', 'CourseController@index')->name('courses.index');
        Route::get('/cursos/{course}', 'CourseController@show')->name('courses.show');

    });

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

Route::post('contato', 'ContactMessageController@store')->name('contact-message.store');

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

    Route::prefix('mercado-pago')->name('mercado-pago.')->middleware('collaborator:admin')->group(function () {
        Route::get('/', 'MercadoPagoController@edit')->name('edit');
        Route::put('/', 'MercadoPagoController@update')->name('update');
    });

    Route::prefix('colaboradores')->name('collaborators.')->middleware('collaborator:admin')->group(function () {
        Route::get('/', 'CollaboratorController@index')->name('index');
        Route::get('cadastrar', 'CollaboratorController@create')->name('create');
        Route::post('/', 'CollaboratorController@store')->name('store');
        Route::post('{collaborator}/promote', 'CollaboratorController@promote')->name('promote');
        Route::post('{collaborator}/depromote', 'CollaboratorController@depromote')->name('depromote');
        Route::delete('{collaborator}', 'CollaboratorController@destroy')->name('destroy');
    });

    Route::prefix('noticias')->name('news.')->middleware('collaborator')->group(function () {
        Route::get('/', 'NewsController@index')->name('index');
        Route::get('cadastrar', 'NewsController@create')->name('create');
        Route::get('{noticia}', 'NewsController@show')->name('show');
        Route::post('/', 'NewsController@store')->name('store');
        Route::get('{noticia}/editar', 'NewsController@edit')->name('edit');
        Route::patch('{noticia}', 'NewsController@update')->name('update');
        Route::delete('{noticia}', 'NewsController@destroy')->name('destroy');

        Route::get('{noticia}/galeria', 'NewsImageGalleryController@index')->name('gallery.index');
        Route::post('{noticia}/galeria', 'NewsImageGalleryController@store')->name('gallery.store');
        Route::delete('{noticia}/galeria', 'NewsImageGalleryController@destroy')->name('gallery.destroy');
    });

    Route::prefix('mensagens')->name('contact-messages.')->middleware('collaborator')->group(function () {
        Route::get('/', 'ContactMessageController@index')->name('index');
        Route::get('{mensagem}', 'ContactMessageController@show')->name('show');
        Route::delete('{mensagem}', 'ContactMessageController@destroy')->name('destroy');
    });
});
