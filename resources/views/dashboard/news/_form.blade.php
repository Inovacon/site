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
    'required' => false,
    'help' => 'Tamanho recomendado: 800x400',
    'preview' => true
])

@include('dashboard.form.file-input', [
    'name' => 'gallery_images[]',
    'label' => 'Galeria',
    'placeholder' => 'Escolha as imagens para a galeria',
    'accept' => 'image/*',
    'required' => false,
    'help' => 'Tamanho recomendado: 800x400',
    'multiple' => true
])

@include('dashboard.form.text-editor', [
    'name' => 'body',
    'label' => 'Texto',
    'value' => old('body', $noticia->body)
])

@include('dashboard.form.checkbox', [
    'name' => 'leading',
    'label' => 'Notícia destaque',
    'checked' => !! old('leading', $noticia->leading),
    'helpMessage' => 'Quando esta opção é marcada a notícia será exibida no carrossel de notícias na parte esquerda da página inicial, caso contrário, será exibida em notícias secundárias na parte direita.'
])
