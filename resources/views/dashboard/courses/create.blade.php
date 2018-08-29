@component('dashboard.layouts.form-page', [
    'title' => 'Cadastrar Curso',
    'action' => route('dashboard.courses.store')
])
    @include('dashboard.courses._form')
@endcomponent
