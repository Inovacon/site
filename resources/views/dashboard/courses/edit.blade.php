@component('dashboard.layouts.form-page', [
    'title' => 'Editar Curso',
    'action' => route('dashboard.courses.update', $course),
    'method' => 'PATCH'
])
    @include('dashboard.courses._form')
@endcomponent
