@extends('layouts.app')

@section('title', 'Nome do Curso - Inovacon')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="card mb-5">
                    <div class="card-header">
                        <h5 class="text-primary font-weight-bold">
                            <i class="{{ $course->occupationArea->icon }} mr-1"></i>
                            {{ $course->name }}
                        </h5>

                        <hr class="border-primary border-2 my-0">
                    </div>

                    <div class="card-body no-gutters">
                        <div>
                            <div class="col-sm-4 float-left" style="z-index: 1;">
                                <img class="mr-lg-3 img-thumbnail" src="{{ $course->publicImagePath }}"/>

                                <p class="small text-center text-primary my-0">{{ $course->occupationArea->name }}
                                    &bull; {{ $course->modality->name }}</p>

                                <div class="text-center text-primary border-bottom border-primary mt-2"
                                     style="border-width: 2px !important;">
                                    <span class="strong">R$ {{ $course->price }}</span>
                                </div>
                            </div>

                            <div class="col">
                                <div class="text-indent text-justify info" style="font-size: .9rem;">
                                    {{ $course->description }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-3"></div>

                    <div class="card-body">
                        <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-info-content-tab" data-toggle="pill"
                                   href="#pills-info-content" role="tab" aria-controls="pills-info-content"
                                   aria-selected="true">
                                   <i class="fas fa-info-circle mr-2"></i>Informações
                                </a>
                            </li>

                            @if ($course->content->count())
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-programmatic-content-tab" data-toggle="pill"
                                       href="#pills-programmatic-content" role="tab"
                                       aria-controls="pills-programmatic-content" aria-selected="false">
                                       <i class="fas fa-list-ul mr-2"></i>Conteúdo Programático
                                    </a>
                                </li>
                            @endif

                            @if ($course->advantages->count())
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-advantages-tab" data-toggle="pill"
                                       href="#pills-advantages" role="tab" aria-controls="pills-advantages"
                                       aria-selected="false">
                                       <i class="fas fa-check mr-2"></i>Vantagens
                                    </a>
                                </li>
                            @endif
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-info-content" role="tabpanel"
                                 aria-labelledby="pills-programmatic-content-tab">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="font-weight-600">
                                            <i class="fas fa-clock fa-fw text-primary pr-2"></i>Turno:
                                        </span>

                                        <span>{{ $course->shift->name }}</span>
                                    </li>

                                    <li class="list-group-item">
                                        <span class="font-weight-600">
                                            <i class="fas fa-user-clock fa-fw text-primary mr-1"></i>Carga Horária:
                                        </span>

                                        <span>{{ $course->hours }} h</span>
                                    </li>

                                    <li class="list-group-item">
                                        <span class="font-weight-600">
                                            <i class="fas fa-calendar-alt fa-fw text-primary mr-1"></i>Duração:
                                        </span>

                                        <span>
                                            De <span class="font-weight-600">{{ $course->begin_date->format('d/m/Y') }}</span> até <span class="font-weight-600">{{ $course->end_date->format('d/m/Y') }}</span>
                                        </span>
                                    </li>

                                    <li class="list-group-item">
                                        <span class="font-weight-600">
                                            <i class="fas fa-graduation-cap fa-fw text-primary mr-1"></i>Tipo de curso:
                                        </span>

                                        <span>{{ $course->type->name }}</span>
                                    </li>

                                    <li class="list-group-item">
                                        <span class="font-weight-600">
                                            <i class="fas fa-users fa-fw text-primary mr-1"></i>Público alvo:
                                        </span>

                                        <span>{{ $course->targetAudience->name }}</span>
                                    </li>
                                </ul>
                            </div>

                            @if ($course->content->count())
                                <div class="tab-pane fade" id="pills-programmatic-content" role="tabpanel"
                                     aria-labelledby="pills-programmatic-content-tab">
                                    <ul class="list-group list-group-flush font-weight-600">
                                        @foreach ($course->content as $value)
                                            <li class="list-group-item">
                                                <i class="fas fa-angle-double-right fa-sm text-primary pr-2"></i>{{ $value }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if ($course->advantages->count())
                                <div class="tab-pane fade" id="pills-advantages" role="tabpanel"
                                     aria-labelledby="pills-advantages-tab">
                                    <ul class="list-group list-group-flush font-weight-600">
                                        @foreach ($course->advantages as $advantage)
                                            <li class="list-group-item">
                                                <i class="fas fa-check fa-sm text-primary pr-2"></i>{{ $advantage }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="mt-5 d-flex flex-column align-items-center">
                            <div>
                                <button class="btn btn-outline-success btn-lg font-weight-bold">
                                    <i class="fas fa-plus-circle fa-lg mr-sm-2"></i>MATRICULE-SE
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="align-self-end">
                            <i class="fab fa-facebook-f text-facebook fa-lg mx-1"></i>
                            <i class="fab fa-twitter text-twitter fa-lg mx-1"></i>
                            <i class="fab fa-google-plus-g text-google fa-lg"></i>
                        </div>
                    </div>

                </div>
            </div>

            <div id="coursesRelated" class="col-sm-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5 class="font-weight-bold text-primary">
                            <i class="fas fa-graduation-cap mr-1"></i>CURSOS RELACIONADOS
                        </h5>

                        <hr class="my-0 border-primary border-2">
                    </div>

                    <div class="card-body px-1">
                        <ul class="list-group list-group-flush">
                            @forelse ($relatedCourses as $course)
                                <li class="list-group-item border-0 p-2">
                                    <a href="{{ route('courses.show', $course) }}" class="link">
                                        <div class="row no-gutters">
                                            <div class="col-4">
                                                <img class="img-fluid" src="{{ $course->publicImagePath }}" alt="">
                                            </div>

                                            <div class="col d-flex flex-column justify-content-around pl-2">
                                                <span class="small text-secondary text-uppercase">
                                                    {{ $course->name }}
                                                </span>

                                                <span class="text-muted" style="font-size: .7rem;">
                                                    <i class="fas fa-clock"></i> {{ $course->shift->name }}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @empty
                                <li class="list-group-item border-0 p-2">Não há cursos relacionados</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
