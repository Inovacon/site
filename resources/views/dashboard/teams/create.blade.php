@component('dashboard.layouts.form-page', [
    'title' => 'Cadastrar Turma(s)',
    'action' => route('dashboard.courses.teams.store', $course)
])
    @include('dashboard.teams._form')
@endcomponent
