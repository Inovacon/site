@extends('dashboard.layout')

@section('title', 'Detalhes do Curso')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h3 class="font-weight-bold text-dark m-0">Detalhes do Curso</h3>

        <div>
            <a class="btn btn-primary pl-3" href="{{ route('courses.edit', $course) }}">
                <i class="fas fa-edit fa-fw fa-lg"></i>
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr>
                    <th class="border-top-0">Id</th>
                    <td class="border-top-0">{{ $course->id }}</td>
                </tr>
                <tr>
                    <th>Nome</th>
                    <td>{{ $course->name }}</td>
                </tr>
                <tr>
                    <th>Imagem</th>
                    <td>
                        <img src="{{ $course->publicImagePath }}" width="200" alt="imagem do curso">
                    </td>
                </tr>
                <tr>
                    <th>Descrição</th>
                    <td>{{ $course->description }}</td>
                </tr>
                <tr>
                    <th>Preço</th>
                    <td>{{ "R$ {$course->price}" }}</td>
                </tr>
                <tr>
                    <th>Ativo</th>
                    <td>
                        <i class="fas fa-circle fa-sm {{ $course->active ? 'text-success' : 'text-danger' }}"></i>
                        {{ $course->active ? 'Sim' : 'Não' }}
                    </td>
                </tr>
                <tr>
                    <th>Mínimo de Alunos</th>
                    <td>{{ $course->minimum_students }}</td>
                </tr>
                <tr>
                    <th>Máximo de Alunos</th>
                    <td>{{ $course->maximum_students }}</td>
                </tr>
                <tr>
                    <th>Carga Horária</th>
                    <td>{{ $course->hours.' h' }}</td>
                </tr>
                <tr>
                    <th>Tipo</th>
                    <td>{!! $course->type->nameWithIcon !!}</td>
                </tr>
                <tr>
                    <th>Modalidade</th>
                    <td>{!! $course->modality->nameWithIcon !!}</td>
                </tr>
                <tr>
                    <th>Turno</th>
                    <td>{!! $course->shift->nameWithIcon !!}</td>
                </tr>
                <tr>
                    <th>Área de Atuação</th>
                    <td>{!! $course->occupationArea->nameWithIcon !!}</td>
                </tr>
                <tr>
                    <th>Público Alvo</th>
                    <td>{!! $course->targetAudience->nameWithIcon !!}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
