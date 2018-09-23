@component('dashboard.layouts.form-page', [
    'title' => 'Editar notícia',
    'action' => route('dashboard.news.update', $noticia),
    'method' => 'PATCH'
])
    @include('dashboard.news._form')
@endcomponent
