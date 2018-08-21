@extends('dashboard.layout')

@section('title', 'Lista de Turmas')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="font-weight-600 text-gray-dark">Turmas</h4>

        <a class="btn btn-outline-primary btn-lg" href="{{ route('dashboard.courses.teams.create', $course) }}">
            <i class="fas fa-plus"></i> Nova turma
        </a>
    </div>

    <hr>

    @if (count($teams))
        <div class="card p-0">
            <div class="card-body p-0">
                @include('dashboard.teams._teams')
            </div>
        </div>
    @else
        <div class="alert alert-warning">
            Não há turmas cadastradas
        </div>
    @endif

    <div class="d-flex flex-row-reverse mt-4">
        {{ $teams->links() }}
    </div>
@endsection
