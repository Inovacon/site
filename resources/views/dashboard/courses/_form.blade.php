@csrf

<d-file-input name="image_path"
              label="Imagem"
              placeholder="Escolha uma imagem"
              :required="false"></d-file-input>

<d-select name="occupation_area_id"
          label="Área de atuação"
          placeholder="Selecione uma área de atuação...">

    @include('dashboard.courses._options', [
        'options' => $occupationAreas,
        'name' => 'occupation_area_id'
    ])
</d-select>

<d-select name="course_type_id"
          label="Tipo"
          placeholder="Selecione um tipo...">

    @include('dashboard.courses._options', [
        'options' => $courseTypes,
        'name' => 'course_type_id'
    ])
</d-select>

<d-select name="modality_id"
          label="Modalidade"
          placeholder="Selecione uma modalidade...">

    @include('dashboard.courses._options', [
        'options' => $modalities,
        'name' => 'modality_id'
    ])
</d-select>

<d-select name="target_audience_id"
          label="Público alvo"
          placeholder="Selecione um público alvo...">

    @include('dashboard.courses._options', [
        'options' => $targetAudiences,
        'name' => 'target_audience_id'
    ])
</d-select>

<d-input name="name"
         label="Nome"
         value="{{ old('name', $course->name) }}"></d-input>

<d-textarea name="description"
            label="Descrição"
            value="{{ old('description', $course->description) }}"></d-textarea>

<d-input name="price"
         type="number"
         label="Preço"
         value="{{ old('price', $course->price) }}"></d-input>

<d-input name="hours"
         type="number"
         label="Carga Horária"
         value="{{ old('hours', $course->hours) }}"></d-input>

<d-button></d-button>
