@csrf

@include('dashboard.form.input', [
    'name' => 'date',
    'type' => 'date',
    'label' => 'Data',
    'value' => old('date', $course->date)
])

@include('dashboard.form.input', [
    'name' => 'start_time',
    'type' => 'time',
    'label' => 'Hora de Início',
    'value' => old('start_time', $course->start_time)
])

@include('dashboard.form.input', [
    'name' => 'end_time',
    'type' => 'time',
    'label' => 'Hora de Término',
    'value' => old('end_time', $course->end_time)
])

@component('dashboard.form.button')
    Salvar
@endcomponent
