@extends('dashboard.layout')

@section('title', 'Cadastrar Colaborador')

@section('content')
    <div>
        <h3 class="font-weight-bold text-dark">Cadastrar Colaborador</h3>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="card mb-5">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('dashboard.collaborators.store') }}">
                        @include('dashboard.collaborators._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
