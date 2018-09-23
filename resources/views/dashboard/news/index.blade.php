@extends('dashboard.layout')

@section('title', 'Lista de notícias')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="font-weight-600 text-gray-dark">Notícias</h4>

        <a class="btn btn-outline-primary btn-lg" href="{{ route('dashboard.news.create') }}">
            <i class="fas fa-plus"></i> Nova notícia
        </a>
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
@endsection
