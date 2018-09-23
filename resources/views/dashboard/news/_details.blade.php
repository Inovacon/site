<table class="table table-responsive-sm">
    <tr>
        <th class="border-top-0">Id</th>
        <td class="border-top-0">{{ $noticia->id }}</td>
    </tr>
    <tr>
        <th>Título</th>
        <td>{{ $noticia->title }}</td>
    </tr>
    <tr>
        <th>Imagem</th>
        <td>
            <img src="{{ $noticia->publicImagePath }}" width="200" alt="imagem da notícia">
        </td>
    </tr>
    <tr>
        <th>Conteúdo</th>
        <td>{{ $noticia->body }}</td>
    </tr>
    <tr>
        <th>Principal</th>
        <td>{{ $noticia->leading ? 'Sim' : 'Não' }}</td>
    </tr>
</table>
