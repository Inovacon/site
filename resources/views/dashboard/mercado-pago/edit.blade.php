@extends('dashboard.layout')

@section('title', 'Editar credenciais')

@section('content')
    <h4 class="font-weight-600 text-gray-dark">Mercado Pago - Credenciais</h4>

    <div class="card mt-4">
        <div class="card-body">
            <form method="POST" action="">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="client_id">Client ID</label>
                    <input type="text"
                           class="form-control"
                           id="client_id"
                           name="client_id"
                           value="{{ $mp->client_id }}">
                </div>

                <div class="form-group">
                    <label for="client_secret">Client Secret</label>
                    <input type="text"
                           class="form-control"
                           id="client_secret"
                           name="client_secret"
                           value="{{ $mp->client_secret }}">
                </div>

                <div class="form-group">
                    <label for="public_key">Public Key</label>
                    <input type="text"
                           class="form-control"
                           id="public_key"
                           name="public_key"
                           value="{{ $mp->public_key }}">
                </div>

                <div class="form-group">
                    <label for="access_token">Access Token</label>
                    <input type="text"
                           class="form-control"
                           id="access_token"
                           name="access_token"
                           value="{{ $mp->access_token }}">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
