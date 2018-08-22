@extends('dashboard.layout')

@section('title', 'Cadastrar Aula')

@section('content')
    <div>
        <h3 class="font-weight-bold text-dark">Cadastrar Aula</h3>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card mb-5 px-sm-4 pb-sm-2">
                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.courses.lessons.store', $team) }}">
                        @include('dashboard.lessons._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
