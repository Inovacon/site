@component('dashboard.layouts.form-page', [
    'title' => 'Cadastrar notícia',
    'action' => route('dashboard.news.store')
])
    @include('dashboard.news._form')
@endcomponent
