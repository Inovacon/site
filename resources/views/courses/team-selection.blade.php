@extends('layouts.app')

@section('title', 'Seleção de turma | Nome do curso')

@section('content')
    <team-selection-view inline-template :initial-team-id="{{ $teams[0]->id }}">
        <div class="container">
            <div class="col-sm-6 mt-5 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0 font-weight-600"><i class="fas fa-graduation-cap mr-1"></i>CONCLUSÃO DE COMPRA</h5>
                    </div>

                    <div class="overlay-container">
                        <img style="object-fit: cover;" class="card-img-top" height="200" src="{{ $course->publicImagePath }}">

                        <div class="overlay-content d-flex flex-column justify-content-center align-items-center">
                        <h1 class="mx-auto text-white font-weight-bold text-shadow">R$ {{ $course->price }}</h1>
                            <div class="lead text-white text-shadow">{{ $course->name }}</div>
                        </div>
                    </div>

                    <form action="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <h5 class="font-weight-600">Selecione sua turma: </h5>
                            </div>

                            @foreach ($teams as $team)
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio"
                                            id="team-{{ $team->id }}"
                                            name="teamId"
                                            v-model="teamId"
                                            value="{{ $team->id }}"
                                            class="custom-control-input">

                                        <label class="custom-control-label" for="team-{{ $team->id }}">
                                            @foreach ($team->lessonsSchedule as $timeRange => $lessons)
                                                <span class="font-weight-600">Turma {{ $team->id }}</span> - Aulas das {{ $timeRange }}

                                                @break
                                            @endforeach
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <a :href="'/turmas/'+teamId+'/comprar-curso'"
                           class="btn btn-lg btn-success btn-block font-weight-bold">
                            <i class="fas fa-check-circle mr-1 fa-lg"></i> Concluir compra
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </team-selection-view>
@endsection
