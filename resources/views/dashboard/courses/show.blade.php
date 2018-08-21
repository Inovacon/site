@extends('dashboard.layout')

@section('title', 'Detalhes do Curso')

@section('content')
    <course-details-view inline-template :active="{{ json_encode($course->active) }}">
        <div>
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="font-weight-600 text-gray-dark m-0">Detalhes do Curso</h4>
                
                <div class="d-flex align-items-center">
                    <activate-button
                            size="2x"
                            data-placement="top"
                            data-tooltip="tooltip"
                            title="Ativar/Desativar"
                            endpoint="{{ route('dashboard.courses.activation', $course) }}"
                            :active="{{ json_encode($course->active) }}"
                            @changed="onChange"></activate-button>

                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle ml-3"
                                type="button"
                                id="dropdownMenuButton"
                                data-toggle="dropdown">
                            <i class="fas fa-cog"></i> Opções
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"
                               href="#"
                               data-toggle="modal"
                               data-target="#contentModal"><i class="fas fa-list fa-fw"></i> Conteúdo</a>

                            <a class="dropdown-item"
                               href="#"
                               data-toggle="modal"
                               data-target="#advantagesModal"><i class="fas fa-check fa-fw"></i> Vantagens</a>

                            <a class="dropdown-item"
                               href="{{ route('dashboard.courses.teams.index', $course) }}">
                                <i class="fas fa-users fa-fw"></i> Turmas
                            </a>

                            <a class="dropdown-item"
                               href="{{ route('dashboard.courses.edit', $course) }}">
                                <i class="fas fa-pencil-alt fa-fw"></i> Editar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="card">
                <div class="card-body">
                    @include('dashboard.courses._details')
                </div>
            </div>

            <course-feature-modal
                    id="contentModal"
                    feature-type="content"
                    input-placeholder="Descrição do conteúdo..."
                    title="Conteúdo Programático"
                    :course-id="{{ $course->id }}"
                    @feature-created="flash('Conteúdo cadastrado com sucesso.')"
                    @feature-creation-failed="flash('A descrição do conteúdo é obrigatória.', 'error')"
                    @feature-updated="flash('Conteúdo atualizado com sucesso.')"
                    @feature-update-failed="flash('A descrição do conteúdo é obrigatória.', 'error')"
                    @feature-deleted="flash('Conteúdo removido com sucesso.')"></course-feature-modal>

            <course-feature-modal
                    id="advantagesModal"
                    feature-type="advantages"
                    input-placeholder="Vantagem..."
                    title="Vantagens"
                    :course-id="{{ $course->id }}"
                    @feature-created="flash('Vantagem cadastrada com sucesso.')"
                    @feature-creation-failed="flash('A descrição da vantagem é obrigatória.', 'error')"
                    @feature-updated="flash('Vantagem atualizada com sucesso.')"
                    @feature-update-failed="flash('A descrição da vantagem é obrigatória.', 'error')"
                    @feature-deleted="flash('Vantagem removida com sucesso.')"></course-feature-modal>
        </div>
    </course-details-view>
@endsection
