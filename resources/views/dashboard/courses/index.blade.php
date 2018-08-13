@extends('dashboard.layout')

@section('title', 'Lista de Cursos')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h3 class="font-weight-bold text-dark m-0">Cursos</h3>

        <add-button
                href="{{ route('dashboard.courses.create') }}"
                content="Cadastrar Curso"></add-button>
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

    <div class="d-flex flex-row-reverse mt-4">
        {{ $courses->links() }}
    </div>
@endsection
