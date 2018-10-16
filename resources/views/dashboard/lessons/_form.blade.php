@csrf

@include('dashboard.form.input', [
    'name' => 'date',
    'type' => 'date',
    'label' => 'Data',
    'value' => old('date', $lesson->date)
])

<div class="row">
    <div class="col-md-6">
        @include('dashboard.form.input', [
            'name' => 'start_time',
            'type' => 'time',
            'label' => 'Hora de Início',
            'value' => old('start_time', $lesson->start_time)
        ])
    </div>

    <div class="col-md-6">
        @include('dashboard.form.input', [
            'name' => 'end_time',
            'type' => 'time',
            'label' => 'Hora de Término',
            'value' => old('end_time', $lesson->end_time)
        ])
    </div>
</div>
