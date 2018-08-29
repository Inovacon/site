@component('dashboard.layouts.form-page', [
    'title' => 'Editar Aula',
    'action' => route('dashboard.courses.lessons.update', [$team, $lesson]),
    'method' => 'PATCH'
])
    @include('dashboard.lessons._form')
@endcomponent
