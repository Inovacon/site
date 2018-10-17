@extends('dashboard.layout')

@section('title', 'Lista de notícias')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="font-weight-600 text-gray-dark">Notícias</h4>

        <button class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#newsFormModal">
            <i class="fas fa-plus"></i> Nova notícia
        </button>
    </div>

    <hr>

    @if (count($news))
        <div class="card p-0">
            <div class="card-body p-0">
                @include('dashboard.news._news')
            </div>
        </div>
    @else
        <div class="alert alert-warning">
            Não há notícias cadastradas
        </div>
    @endif

    <div class="d-flex flex-row-reverse mt-4">
        {{ $news->links() }}
    </div>

    @component('dashboard.layouts.modal-form', [
        'id' => 'newsFormModal',
        'action' => route('dashboard.news.store'),
        'title' => 'Cadastrar notícia',
        'size' => 'lg',
        'centered' => true
    ])
        @include('dashboard.news._form')
    @endcomponent
@endsection
