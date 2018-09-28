@extends('layouts.app')

@section('title', $course->name . ' | Inovacon')

@section('content')
    <div id="course" class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="card mb-5">
                    <div class="card-header bg-primary">
                        <h5 class="text-white text-uppercase font-weight-bold mb-0">
                            <i class="{{ $course->occupationArea->icon }} mr-1"></i>
                            {{ $course->name }}
                        </h5>
                    </div>

                    <div class="card-body no-gutters">
                        <div>
                            <div class="col-lg-6 col mr-2 mb-2 float-left">
                                <div class="overlay-container">
                                    <img style="object-fit: cover;" class="img-thumbnail w-100" src="{{ $course->publicImagePath }}"/>

                                    <div class="ribbon horizontal-ribbon text-center">
                                        <span class="text-uppercase">{{ $course->modality->name }}</span>
                                    </div>

                                    <div class="ribbon corner-right-ribbon">
                                        <span>R${{ $course->price }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="text-justify course-description">
                                    {!! $course->description !!}
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

                            <li class="nav-item">
                                <a class="nav-link" id="pills-programmatic-content-tab" data-toggle="pill"
                                   href="#pills-programmatic-content" role="tab"
                                   aria-controls="pills-programmatic-content" aria-selected="false">
                                   <i class="fas fa-list-ul mr-2"></i>Conteúdo Programático
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="pills-advantages-tab" data-toggle="pill"
                                   href="#pills-advantages" role="tab" aria-controls="pills-advantages"
                                   aria-selected="false">
                                   <i class="fas fa-check mr-2"></i>Vantagens
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content text-dark" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-info-content" role="tabpanel"
                                 aria-labelledby="pills-programmatic-content-tab">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="font-weight-600">
                                            <i class="fas fa-graduation-cap fa-fw text-primary mr-1"></i>Área relacionada:
                                        </span>

                                        <span>{{ $course->occupationArea->name }}</span>
                                    </li>

                                    <li class="list-group-item">
                                        <span class="font-weight-600">
                                            <i class="fas fa-graduation-cap fa-fw text-primary mr-1"></i>Tipo de curso:
                                        </span>

                                        <span>{{ $course->type->name }}</span>
                                    </li>

                                    <li class="list-group-item">
                                        <span class="font-weight-600">
                                            <i class="fas fa-user-clock fa-fw text-primary mr-1"></i>Carga Horária:
                                        </span>

                                        <span>{{ $course->hours }}h</span>
                                    </li>


                                    <li class="list-group-item">
                                        <span class="font-weight-600">
                                            <i class="fas fa-chalkboard-teacher fa-fw text-primary mr-1"></i>Modalidade:
                                        </span>

                                        <span>{{ $course->modality->name }}</span>
                                    </li>

                                    <li class="list-group-item">
                                        <span class="font-weight-600">
                                            <i class="fas fa-users fa-fw text-primary mr-1"></i>Público alvo:
                                        </span>

                                        <span>{{ $course->targetAudience->name }}</span>
                                    </li>

                                    <li class="list-group-item">
                                        <span class="font-weight-600">
                                            <i class="fas fa-hand-holding-usd fa-fw text-primary mr-1"></i>Preço:
                                        </span>

                                        <span>R${{ $course->price }}</span>
                                    </li>

                                </ul>
                            </div>

                            <div class="tab-pane fade" id="pills-programmatic-content" role="tabpanel"
                                 aria-labelledby="pills-programmatic-content-tab">
                                <ul class="list-group list-group-flush">
                                    @forelse ($course->content as $value)
                                        <li class="list-group-item">
                                            <i class="fas fa-angle-right fa-sm text-primary pr-2"></i>{{ $value }}
                                        </li>

                                    @empty
                                        <div class="text-center text-secondary">
                                            <i class="fas fa-info-circle fa-3x mt-4"></i>
                                            <p class="mt-3">Desculpe, nenhum conteúdo programático foi cadastrada para este curso ainda.</p>
                                        </div>
                                    @endforelse
                                </ul>
                            </div>

                            <div class="tab-pane fade" id="pills-advantages" role="tabpanel"
                                 aria-labelledby="pills-advantages-tab">
                                    <ul class="list-group list-group-flush">
                                        @forelse ($course->advantages as $advantage)
                                                <li class="list-group-item">
                                                    <i class="fas fa-check fa-sm text-primary pr-2"></i>{{ $advantage }}
                                                </li>
                                        @empty
                                            <div class="text-center text-secondary">
                                                <i class="fas fa-info-circle fa-3x mt-4"></i>
                                                <p class="mt-3">Desculpe, nenhuma vantagem foi cadastrada para este curso ainda.</p>
                                            </div>
                                        @endforelse
                                    </ul>
                            </div>
                        </div>

                        <div class="mt-5 d-flex flex-column align-items-center">
                            <div>
                                <a href="{{ route('teams.index', $course) }}" class="btn btn-outline-success btn-lg font-weight-bold">
                                    <i class="fas fa-plus-circle fa-lg mr-sm-2"></i>MATRICULE-SE
                                </a>
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

                    </div>
                        <hr class="my-0 border-primary border-2">

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
