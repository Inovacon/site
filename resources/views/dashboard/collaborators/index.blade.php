@extends('dashboard.layout')

@section('title', 'Lista de Colaboradores')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="font-weight-600 text-gray-dark">Colaboradores</h4>

        <a class="link" href="{{ route('dashboard.collaborators.create') }}">
            <i class="fas fa-user-plus"></i> Novo colaborador
        </a>
    </div>
    
    <hr>

    <div class="card p-0">
        <div class="card-body p-0">
            @include('dashboard.collaborators._collaborators')
        </div>
    </div>

    <div class="d-flex flex-row-reverse mt-4">
        {{ $collaborators->links() }}
    </div>
@endsection
