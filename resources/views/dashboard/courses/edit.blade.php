@extends('dashboard.layout')

@section('title', 'Editar Curso')

@section('content')
    <div>
        <h3 class="font-weight-bold text-dark">Editar Curso</h3>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('dashboard.courses.update', $course) }}" enctype="multipart/form-data">
                        @method('PATCH')

                        @include('dashboard.courses._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
