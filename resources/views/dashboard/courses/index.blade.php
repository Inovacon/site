@extends('dashboard.layout')

@section('title', 'Lista de Cursos')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="font-weight-600 text-gray-dark">Cursos</h4>
    
        <a class="btn btn-outline-primary btn-lg" href="{{ route('dashboard.courses.create') }}">
            <i class="fas fa-plus"></i> Novo curso
        </a>
    </div>

    <hr>

    @if (count($courses))
        <div class="card p-0">
            <div class="card-body p-0">
                @include('dashboard.courses._courses')
            </div>
        </div>
    @else
        <div class="alert alert-warning">
            Não há cursos cadastrados
        </div>
    @endif

    <div class="d-flex flex-row-reverse mt-4">
        {{ $courses->links() }}
    </div>
@endsection
