@extends('dashboard.layout')

@section('title', 'Cadastrar Curso')

@section('content')
    <div>
        <h3 class="font-weight-bold text-dark">Cadastrar Curso</h3>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card mb-5 px-sm-4 pb-sm-2">
                <div class="card-body">
                    <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                        @include('dashboard.courses._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
