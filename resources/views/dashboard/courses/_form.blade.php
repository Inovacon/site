<div class="row">
    <div class="col-md-6">
        @include('dashboard.form.input', [
            'name' => 'name',
            'label' => 'Nome',
            'value' => old('name', $course->name),
            'placeholder' => 'Digite'
        ])
    </div>

    <div class="col-md-6">
        @include('dashboard.form.file-input', [
            'name' => 'image_path',
            'label' => 'Imagem',
            'placeholder' => 'Escolha uma imagem',
            'required' => false,
            'accept' => 'image/*',
            'help' => 'Tamanho recomendado: 315x180'
        ])
    </div>
</div>

@include('dashboard.form.textarea', [
    'id' => 'course-body',
    'name' => 'description',
    'label' => 'Descrição',
    'value' => old('description', $course->description)
])

<div class="row">
    <div class="col-md-6">
        @include('dashboard.form.select', [
            'name' => 'occupation_area_id',
            'placeholder' => 'Selecione uma área de atuação...',
            'label' => 'Área de atuação',
            'options' => $occupationAreas,
            'model' => $course
        ])
    </div>

    <div class="col-md-6">
        @include('dashboard.form.select', [
            'name' => 'course_type_id',
            'placeholder' => 'Selecione um tipo...',
            'label' => 'Tipo',
            'options' => $courseTypes,
            'model' => $course
        ])
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        @include('dashboard.form.select', [
            'name' => 'modality_id',
            'placeholder' => 'Selecione uma modalidade...',
            'label' => 'Modalidade',
            'options' => $modalities,
            'model' => $course
        ])
    </div>

    <div class="col-md-6">
        @include('dashboard.form.select', [
            'name' => 'target_audience_id',
            'placeholder' => 'Selecione um público alvo...',
            'label' => 'Público alvo',
            'options' => $targetAudiences,
            'model' => $course
        ])
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        @include('dashboard.form.input', [
            'name' => 'price',
            'type' => 'number',
            'label' => 'Preço',
            'value' => old('price', $course->price),
            'step' => 0.01,
            'placeholder' => 'Digite'
        ])
    </div>

    <div class="col-md-6">
        @include('dashboard.form.input', [
            'name' => 'hours',
            'type' => 'number',
            'label' => 'Carga Horária',
            'value' => old('hours', $course->hours),
            'step' => 0.1,
            'placeholder' => 'Digite'
        ])
    </div>
</div>
