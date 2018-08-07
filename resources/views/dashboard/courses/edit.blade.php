@extends('dashboard.layout')

@section('title', 'Editar Curso')

@section('content')
    <div>
        <h3 class="font-weight-bold text-dark">Editar Curso</h3>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            @if (session('flash'))
                <div class="alert alert-success mb-3">
                    {{ session('flash') }}
                </div>
            @endif

            <div class="card mb-5 px-sm-4 pb-sm-2">
                <div class="card-body">
                    <form method="POST" action="{{ route('courses.update', $course) }}">
                        @method('PATCH')

                        @include('dashboard.courses._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
