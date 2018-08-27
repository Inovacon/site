@csrf

@include('dashboard.form.input', [
    'name' => 'name',
    'label' => 'Nome Completo',
    'value' => old('name', $collaborator->name)
])

@include('dashboard.form.input', [
    'name' => 'email',
    'type' => 'email',
    'label' => 'E-mail',
    'value' => old('email', $collaborator->email)
])

@include('dashboard.form.input', [
    'name' => 'password',
    'type' => 'password',
    'label' => 'Senha'
])

@include('dashboard.form.input', [
    'name' => 'password_confirmation',
    'type' => 'password',
    'label' => 'Confirme a Senha'
])

@component('dashboard.form.button')
    Salvar
@endcomponent
