@extends('layouts.app')

@section('title', 'Cadastrar Curso')

@section('header')
    @include('dashboard._nav')
@endsection

@section('content')
    <div class="container">
        <div>
            <h4 class="mb-0 font-weight-bold text-dark">CADASTRAR CURSO</h4>

            <hr class="border-primary border-2">
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-5">
                    <div class="card-body">
                        <form method="POST" action="{{ route('courses.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="occupation_area_id">Área de atuação</label>
                                <select class="form-control" name="occupation_area_id" id="occupation_area_id" required>
                                    <option value="">Selecione uma área de atuação...</option>

                                    @foreach ($occupationAreas as $area)
                                        <option value="{{ $area->id }}" {{ old('occupation_area_id') == $area->id ? 'selected' : '' }}>
                                            {{ $area->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="course_type_id">Tipo</label>
                                <select class="form-control" name="course_type_id" id="course_type_id" required>
                                    <option value="">Selecione um tipo...</option>

                                    @foreach ($courseTypes as $type)
                                        <option value="{{ $type->id }}" {{ old('course_type_id') == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="modality_id">Modalidade</label>
                                <select class="form-control" name="modality_id" id="modality_id" required>
                                    <option value="">Selecione uma modalidade...</option>

                                    @foreach ($modalities as $modality)
                                        <option value="{{ $modality->id }}" {{ old('modality_id') == $modality->id ? 'selected' : '' }}>
                                            {{ $modality->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="shift_id">Turno</label>
                                <select class="form-control" name="shift_id" id="shift_id" required>
                                    <option value="">Selecione um turno...</option>

                                    @foreach ($shifts as $shift)
                                        <option value="{{ $shift->id }}" {{ old('shift_id') == $shift->id ? 'selected' : '' }}>
                                            {{ $shift->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="target_audience">Público alvo</label>
                                <input type="text" class="form-control" id="target_audience" name="target_audience" value="{{ old('target_audience') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="price">Preço</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="minimum_students">Mínimo de alunos</label>
                                <input type="number" class="form-control" id="minimum_students" name="minimum_students" value="{{ old('minimum_students') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="maximum_students">Máximo de alunos</label>
                                <input type="number" class="form-control" id="maximum_students" name="maximum_students" value="{{ old('maximum_students') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="hours">Carga horária</label>
                                <input type="number" class="form-control" id="hours" name="hours" value="{{ old('hours') }}" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
