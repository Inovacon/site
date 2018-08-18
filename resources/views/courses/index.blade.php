@extends('layouts.app')

@section('title', 'Cursos - Inovacon')

@section('content')
    <div class="container">
        <h4 class="mb-0 font-weight-bold text-dark">
            <i class="fas fa-graduation-cap fa-lg fa-fw mr-1"></i>CURSOS
        </h4>

        <hr class="border-primary border-2">

        <div class="row">
            <div id="coursesSidebar" class="col-md-3">
                <div class="card">
                    <div class="card-header bg-primary border-bottom">
                        <h6 class="text-center mb-0 text-white">ÁREAS DE CURSOS</h6>
                    </div>

                    <ul class="list-group list-group-flush">
                        <a class="list-group-item list-unstyled d-flex justify-content-between {{ ! request('area') ? 'active' : '' }}"
                           href="{{ route('courses.index') }}">
                            <li class="text-capitalize">
                                <i class="fas fa-globe fa-fw"></i> Todas
                            </li>

                            <span class="badge badge-pill badge-primary align-self-center">
                                {{ $coursesCount }}
                            </span>
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

            <div id="courses" class="col-md-9">
                <div class="row">
                    @foreach ($courses as $course)
                        <div class="col-lg-4 col-sm-6 mb-3">
                            <div class="card">

                                <div class="overlay-container">
                                    <img class="card-img-top" src="{{ $course->publicImagePath }}" width="250" height="145">
                                    <a href="{{ route('courses.show', $course) }}"></a>
                                </div>
                                
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <div class="mb-0 text-primary text-uppercase font-weight-bold">
                                            <a class="link" href="{{ route('courses.show', $course) }}">{{ $course->name }}</a>
                                        </div>

                                        <i class="text-primary {{ $course->occupationArea->icon }}"></i>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <span class="small text-muted text-uppercase">{{ $course->modality->name }}</span>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <p class="small text-justify text-secondary">{{ str_limit($course->description, 150) }}</p>
                                </div>

                                <div class="card-body info">
                                    <div class="d-flex justify-content-between text-dark ">
                                        <div class="font-weight-600">
                                            <i class="fas fa-clock mr-1"></i>{{ $course->shift->name }}
                                        </div>

                                        <div class="font-weight-600">
                                            <strong>R$</strong> {{ $course->price }}
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer p-0">
                                    <a href="{{ route('courses.show', $course) }}" class="link p-2 text-center d-block text-uppercase">
                                        <i class="fas fa-plus-circle mr-2"></i><span class="font-weight-bold">Matricule-se</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
