@extends('dashboard.layout')

@section('title', 'Editar Curso')

@section('content')
    <div>
        <h4 class="mb-0 font-weight-bold text-dark">EDITAR CURSO</h4>

        <hr class="border-primary border-2">
    </div>

    <div class="row">
        <div class="col-md-12">
            @if (session('flash'))
                <div class="alert alert-success mb-3">
                    {{ session('flash') }}
                </div>
            @endif

            <div class="card mb-5">
                <div class="card-body">
                    <form method="POST" action="{{ route('courses.update', $course) }}">
                        @method('PATCH')

                        @include('dashboard.courses._form', ['button' => 'Editar'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
