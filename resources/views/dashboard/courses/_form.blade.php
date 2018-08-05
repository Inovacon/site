@csrf

<div class="form-group">
    <label for="occupation_area_id">Área de atuação</label>
    <select class="form-control" name="occupation_area_id" id="occupation_area_id" required>
        <option value="">Selecione uma área de atuação...</option>

        @foreach ($occupationAreas as $area)
            <option value="{{ $area->id }}"
                    {{ old('occupation_area_id', $course->occupation_area_id) == $area->id ? 'selected' : '' }}>
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
            <option value="{{ $type->id }}"
                    {{ old('course_type_id', $course->course_type_id) == $type->id ? 'selected' : '' }}>
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
            <option value="{{ $modality->id }}"
                    {{ old('modality_id', $course->modality_id) == $modality->id ? 'selected' : '' }}>
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
            <option value="{{ $shift->id }}"
                    {{ old('shift_id', $course->shift_id) == $shift->id ? 'selected' : '' }}>
                {{ $shift->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="target_audience_id">Público alvo</label>
    <select class="form-control" name="target_audience_id" id="target_audience_id" required>
        <option value="">Selecione um público alvo...</option>

        @foreach ($targetAudiences as $audience)
            <option value="{{ $audience->id }}"
                    {{ old('target_audience_id', $course->target_audience_id) == $audience->id ? 'selected' : '' }}>
                {{ $audience->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="name">Nome</label>
    <input type="text"
           class="form-control"
           id="name"
           name="name"
           value="{{ old('name', $course->name) }}"
           required>
</div>

<div class="form-group">
    <label for="description">Descrição</label>
    <input type="text"
           class="form-control"
           id="description"
           name="description"
           value="{{ old('description', $course->description) }}"
           required>
</div>

<div class="form-group">
    <label for="price">Preço</label>
    <input type="number"
           class="form-control"
           id="price"
           name="price"
           value="{{ old('price', $course->price) }}"
           required>
</div>

<div class="form-group">
    <label for="minimum_students">Mínimo de alunos</label>
    <input type="number"
           class="form-control"
           id="minimum_students"
           name="minimum_students"
           value="{{ old('minimum_students', $course->minimum_students) }}"
           required>
</div>

<div class="form-group">
    <label for="maximum_students">Máximo de alunos</label>
    <input type="number"
           class="form-control"
           id="maximum_students"
           name="maximum_students"
           value="{{ old('maximum_students', $course->maximum_students) }}"
           required>
</div>

<div class="form-group">
    <label for="hours">Carga horária</label>
    <input type="number"
           class="form-control"
           id="hours"
           name="hours"
           value="{{ old('hours', $course->hours) }}"
           required>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">
        {{ $button }}
    </button>
</div>
