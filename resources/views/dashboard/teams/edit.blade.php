@component('dashboard.layouts.form-page', [
    'title' => 'Editar Turma',
    'method' => 'PATCH',
    'action' => route('dashboard.courses.teams.update', [$course, $team])
])
    @include('dashboard.teams._form')
@endcomponent
