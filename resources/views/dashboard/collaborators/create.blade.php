@component('dashboard.layouts.form-page', [
    'title' => 'Cadastrar Colaborador',
    'action' => route('dashboard.collaborators.store')
])
    @include('dashboard.collaborators._form')
@endcomponent
