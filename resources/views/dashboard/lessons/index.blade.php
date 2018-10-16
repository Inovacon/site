@extends('dashboard.layout')

@section('title', 'Lista de Aulas')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="font-weight-600 text-gray-dark">Cronograma de Aulas</h4>

        <a class="btn btn-outline-primary btn-lg" href="{{ route('dashboard.courses.lessons.create', $team) }}">
            <i class="fas fa-plus"></i> Cadastrar aulas
        </a>
    </div>

    <hr>

    @if (count($lessons))
        <div class="card p-0">
            <div class="card-body p-0">
                @include('dashboard.lessons._lessons')
            </div>
        </div>
    @else
        <div class="alert alert-warning">
            Não há aulas cadastradas
        </div>
    @endif

    <div class="d-flex flex-row-reverse mt-4">
        {{ $lessons->links() }}
    </div>
@endsection
