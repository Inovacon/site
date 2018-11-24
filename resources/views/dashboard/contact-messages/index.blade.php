@extends('dashboard.layout')

@section('title', 'Lista de mensagens')

@section('content')
    <h4 class="font-weight-600 text-gray-dark">Mensagens</h4>

    <hr>

    @if (count($messages))
        <div class="card p-0">
            <div class="card-body p-0">
                @include('dashboard.contact-messages._messages')
            </div>
        </div>
    @else
        <div class="alert alert-warning">
            Não há mensagens enviadas
        </div>
    @endif

    <div class="d-flex flex-row-reverse mt-4">
        {{ $messages->links() }}
    </div>
@endsection
