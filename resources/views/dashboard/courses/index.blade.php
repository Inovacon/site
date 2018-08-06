@extends('dashboard.layout')

@section('title', 'Lista de Cursos')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h3 class="font-weight-bold text-dark m-0">Cursos</h3>

        <a href="{{ route('courses.create') }}" class="btn btn-lg btn-primary">Cadastrar Curso</a>
    </div>

    <div class="card p-0">
        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th>Nome</th>
                        <th>Área</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td class="text-center">{{ $course->id }}</td>
                            <td>
                                <a href="{{ route('dashboard.courses.show', $course) }}" class="font-weight-bold">
                                    {{ $course->name }}
                                </a>
                            </td>
                            <td>{{ $course->occupationArea->name }}</td>
                            <td class="text-right">
                                <div class="pr-4">
                                    <a href="{{ route('dashboard.courses.show', $course) }}" class="btn-icon">
                                        <i class="fas fa-eye fa-lg"></i>
                                    </a>

                                    <a href="{{ route('courses.edit', $course) }}" class="btn-icon ml-2">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div>
        {{ $courses->links() }}
    </div>
@endsection
