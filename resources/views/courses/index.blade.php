@extends('layouts.app')

@section('title', 'Cursos - Inovacon')

@section('content')
    <div class="container">
        <h4 class="mb-0 font-weight-bold text-dark">
            <i class="fas fa-graduation-cap fa-lg fa-fw mr-1"></i>CURSOS
        </h4>

        <hr class="border-primary border-2">

        <div class="row">
            <div id="coursesAreas" class="col-md-3">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h6 class="text-center mb-0 text-white font-weight-600">ÁREAS DE CURSOS</h6>
                    </div>

                    <ul class="list-group list-group-flush">
                        <a class="list-group-item list-unstyled d-flex justify-content-between {{ ! request('area') ? 'active' : '' }}"
                           href="{{ route('courses.index') }}">
                            <li class="text-capitalize">
                                <i class="fas fa-globe fa-fw"></i> Todas
                            </li>
                        </a>

                        @foreach ($occupationAreas as $area)
                            <a class="list-group-item list-unstyled d-flex justify-content-between {{ request('area') == $area->id ? 'active' : '' }}"
                               href="{{ sprintf('%s?area=%s', route('courses.index'), $area->id) }}">
                                <li class="text-capitalize">
                                    {!! $area->nameWithIcon !!}
                                </li>

                                <span class="badge badge-pill badge-primary align-self-center">
                                    {{ $area->activeCourses()->count() }}
                                </span>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div id="coursesCard" class="col-md-9">
                <div class="row">
                    @forelse ($courses as $course)
                        <div class="col-lg-4 col-sm-6 mb-3">
                            @include('courses._course-card')
                        </div>
                    @empty
                        <div class="mx-auto text-muted">
                            <div class="text-center mb-3"><i class="fas fa-info-circle fa-5x"></i></div>
                            <div class="lead">Desculpe, no momento não há nenhum curso disponível para esta área, volte mais tarde!</div>
                        </div>
                        
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
