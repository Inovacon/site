@extends('dashboard.layout')

@section('title', 'Lista de Colaboradores')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="font-weight-600 text-gray-dark">Colaboradores</h4>

        <button class="btn btn-lg btn-outline-primary" data-toggle="modal" data-target="#collaboratorFormModal">
            <i class="fas fa-plus"></i> Novo colaborador
        </button>
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

    @component('dashboard.layouts.modal-form', [
        'id' => 'collaboratorFormModal',
        'action' => route('dashboard.collaborators.store'),
        'title' => 'Cadastrar colaborador',
        'size' => 'lg',
        'centered' => true
    ])
        @include('dashboard.collaborators._form')
    @endcomponent
@endsection
