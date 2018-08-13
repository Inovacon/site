@extends('dashboard.layout')

@section('title', 'Lista de Colaboradores')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h3 class="font-weight-bold text-dark m-0">Colaboradores</h3>

        <add-button
                href="{{ route('dashboard.collaborators.create') }}"
                content="Cadastrar Colaborador"></add-button>
    </div>


    <div class="card p-0">
        <div class="card-body p-0">
            @include('dashboard.collaborators._collaborators')
        </div>
    </div>

    <div class="d-flex flex-row-reverse mt-4">
        {{ $collaborators->links() }}
    </div>
@endsection
