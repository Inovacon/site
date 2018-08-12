@extends('dashboard.layout')

@section('title', 'Detalhes do Curso')

@section('content')
    <course-details-view inline-template :active="{{ json_encode($course->active) }}">
        <div>
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h3 class="font-weight-bold text-dark m-0">Detalhes do Curso</h3>

                <div class="d-flex align-items-center">
                    <activate-button
                            size="3x"
                            title="Ativar/Desativar curso"
                            endpoint="{{ route('dashboard.courses.activation', $course) }}"
                            :active="{{ json_encode($course->active) }}"
                            @changed="onChange"></activate-button>

                    <button title="Gerenciar conteúdo programático"
                            type="button"
                            class="btn btn-primary ml-3"
                            data-toggle="modal"
                            data-target="#contentModal">
                        <i class="fas fa-list-ul fa-lg"></i>
                    </button>

                    <button title="Gerenciar as vantagens do curso"
                            type="button"
                            class="btn btn-primary ml-3"
                            data-toggle="modal"
                            data-target="#advantagesModal">
                        <i class="fas fa-check fa-lg"></i>
                    </button>

                    <a title="Editar curso"
                       class="btn btn-primary ml-3"
                       href="{{ route('dashboard.courses.edit', $course) }}">
                        <i class="fas fa-pencil-alt fa-lg"></i>
                    </a>
                </div>
            </div>

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
