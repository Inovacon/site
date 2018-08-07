@extends('dashboard.layout')

@section('title', 'Lista de Cursos')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h3 class="font-weight-bold text-dark m-0">Cursos</h3>

        <a href="{{ route('courses.create') }}" class="btn btn-lg btn-primary">Cadastrar Curso</a>
    </div>

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

    <div>
        {{ $courses->links() }}
    </div>
@endsection
