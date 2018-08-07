@extends('dashboard.layout')

@section('title', 'Detalhes do Curso')

@section('content')
    <course-details-view inline-template :active="{{ json_encode($course->active) }}">
        <div>
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h3 class="font-weight-bold text-dark m-0">Detalhes do Curso</h3>

                <div class="d-flex align-items-center">
                    <activate-button
                        @changed="activated = ! activated"
                        endpoint="{{ route('dashboard.courses.activation', $course) }}"
                        :active="{{ json_encode($course->active) }}"
                        size="3x"></activate-button>

                    <a class="btn btn-primary pl-3 ml-3" href="{{ route('dashboard.courses.edit', $course) }}">
                        <i class="fas fa-edit fa-fw fa-lg"></i>
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    @include('dashboard.courses._details')
                </div>
            </div>
        </div>
    </course-details-view>
@endsection
