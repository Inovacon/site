@include('dashboard.form.input', [
    'name' => 'title',
    'label' => 'Título',
    'value' => old('title', $noticia->title)
])

@include('dashboard.form.file-input', [
    'name' => 'image_path',
    'label' => 'Imagem',
    'placeholder' => 'Escolha uma imagem',
    'accept' => 'image/*',
    'required' => false
])

@include('dashboard.form.textarea', [
    'name' => 'body',
    'label' => 'Texto',
    'value' => old('body', $noticia->body)
])

@include('dashboard.form.checkbox', [
    'name' => 'leading',
    'label' => 'Notícia destaque',
    'checked' => !! old('leading', $noticia->leading)
])
