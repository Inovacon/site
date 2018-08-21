@extends('dashboard.layout')

@section('title', 'Cadastrar Turma')

@section('content')
    <div>
        <h3 class="font-weight-bold text-dark">Cadastrar Turma(s)</h3>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card mb-5 px-sm-4 pb-sm-2">
                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.courses.teams.store', $course) }}">
                        @include('dashboard.teams._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
