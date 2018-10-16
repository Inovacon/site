@component('dashboard.layouts.form-page', [
    'title' => 'Cadastrar cronograma de aulas',
    'action' => route('dashboard.courses.schedules.store', $team),
    'showButton' => false
])
    @include('dashboard.lessons._special-form')
@endcomponent
