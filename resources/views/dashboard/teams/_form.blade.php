@include('dashboard.form.input', [
    'name' => 'minimum_students',
    'type' => 'number',
    'label' => 'Mínimo de alunos',
    'value' => old('minimum_students', $team->minimum_students)
])

@include('dashboard.form.input', [
    'name' => 'maximum_students',
    'type' => 'number',
    'label' => 'Máximo de alunos',
    'value' => old('maximum_students', $team->maximum_students)
])

@include('dashboard.form.input', [
    'name' => 'times',
    'type' => 'number',
    'label' => 'Quantidade',
    'value' => 1
])
