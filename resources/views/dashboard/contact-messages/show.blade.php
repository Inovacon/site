@extends('dashboard.layout')

@section('title', 'Detalhes da Mensagem')

@section('content')
    <div>
        <h4 class="font-weight-600 text-gray-dark mb-3">
            Detalhes da Mensagem
        </h4>

        <div class="d-flex justify-content-between align-items-center">
            <a class="btn btn-outline-primary" href="{{ route('dashboard.contact-messages.index') }}">
                Voltar
            </a>

            <secure-delete-button
                    classes="btn-icon ml-2 text-danger"
                    url="{{ route('dashboard.contact-messages.destroy', $message) }}"
                    alert="Isso irá remover a mensagem, essa ação não pode ser desfeita.">
                <i class="fas fa-trash-alt fa-lg"></i>
            </secure-delete-button>
        </div>

        <hr>

        <div class="card">
            <div class="card-body p-3">
                @include('dashboard.contact-messages._details')
            </div>
        </div>
    </div>
@endsection
