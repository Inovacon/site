@extends('dashboard.layout')

@section('title', 'Detalhes do Curso')

@section('content')
    <course-details-view inline-template :active="{{ json_encode($course->active) }}">
        <div>
            <h4 class="text-grayish mb-4">
                <i class="fas fa-fw fa-graduation-cap"></i> Detalhes do curso
            </h4>

            <div class="row">
                <div class="col-md-4">
                    @include('dashboard.courses._details')

                    <br>

                    <div class="card card-body card-list p-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-grayish mb-0"><i class="fas fa-users fa-fw mr-2"></i>Turmas</h6>
                            <button class="btn btn-icon text-primary" data-toggle="modal" data-target="#teamFormModal">
                                <i class="fas fa-plus fa-lg"></i>
                            </button>
                        </div>

                        <ul class="list-unstyled mb-0">
                            @forelse ($teams as $t)
                                <li>
                                    <span class="small">Nº de alunos: 0</span>
                                    <a href="{{ route('dashboard.courses.teams.show', [$course, $t]) }}">
                                        Turma {{ $t->id }}
                                    </a>
                                </li>
                            @empty
                                <span class="small text-danger">
                                    <i class="fas fa-exclamation fa-fw"></i>
                                    <b>Não há nenhuma turma associada a esse curso. Por favor, cadastre ao menos uma turma para que o curso possa ser ativado.</b>
                                </span>
                            @endforelse
                        </ul>
                    </div>

                    <br>
                </div>

                <div class="col-md-8">
                    <course-feature-form
                            id="contentModal"
                            feature-type="content"
                            input-placeholder="Descrição do conteúdo..."
                            title="Conteúdo Programático"
                            title-icon="list"
                            :course-id="{{ $course->id }}"
                            @feature-created="flash('Conteúdo cadastrado com sucesso.')"
                            @feature-creation-failed="flash('A descrição do conteúdo é obrigatória.', 'error')"
                            @feature-updated="flash('Conteúdo atualizado com sucesso.')"
                            @feature-update-failed="flash('A descrição do conteúdo é obrigatória.', 'error')"
                            @feature-deleted="flash('Conteúdo removido com sucesso.')"></course-feature-form>

                    <br>

                    <course-feature-form
                            id="advantagesModal"
                            feature-type="advantages"
                            input-placeholder="Vantagem..."
                            title="Vantagens"
                            title-icon="thumbs-up"
                            :course-id="{{ $course->id }}"
                            @feature-created="flash('Vantagem cadastrada com sucesso.')"
                            @feature-creation-failed="flash('A descrição da vantagem é obrigatória.', 'error')"
                            @feature-updated="flash('Vantagem atualizada com sucesso.')"
                            @feature-update-failed="flash('A descrição da vantagem é obrigatória.', 'error')"
                            @feature-deleted="flash('Vantagem removida com sucesso.')"></course-feature-form>
                </div>
            </div>

            @component('dashboard.layouts.modal-form', [
                'id' => 'courseFormModal',
                'action' => route('dashboard.courses.update', $course),
                'method' => 'PATCH',
                'title' => 'Editar curso',
                'size' => 'lg',
                'centered' => true
            ])
                @include('dashboard.courses._form')
            @endcomponent

            @component('dashboard.layouts.modal-form', [
                'id' => 'teamFormModal',
                'action' => route('dashboard.courses.teams.store', $course),
                'title' => 'Cadastrar turma',
                'size' => 'lg',
                'centered' => true
            ])
                @include('dashboard.teams._form')
            @endcomponent
        </div>
    </course-details-view>
@endsection
