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
    'help' => 'Tamanho recomendado: 800x400'
])

@include('dashboard.form.textarea', [
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
