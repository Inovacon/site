<table id="detalhesNoticia" class="table table-responsive-sm">
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
            <img src="{{ $noticia->publicImagePath }}" width="400" alt="imagem da notícia">
        </td>
    </tr>
    <tr>
        <th>Conteúdo</th>
        <td>{!! $noticia->body !!}</td>
    </tr>

    @if ($noticia->gallery_images)
        <tr>
            <th>Galeria</th>
            <td>
                <div id="imagensGaleria" style="width: 400px" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @for ($i = 0; $i < count($noticia->gallery_images); ++$i)
                            <div class="carousel-item{{ $i === 0 ? ' active' : '' }}">
                                <img class="d-block w-100" src="{{ $noticia->gallery_images[$i] }}">
                            </div>
                        @endfor
                    </div>

                    <a class="carousel-control-prev" href="#imagensGaleria" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#imagensGaleria" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </div>
            </td>
        </tr>
    @endif
    <tr>
        <th>Principal</th>
        <td>{{ $noticia->leading ? 'Sim' : 'Não' }}</td>
    </tr>
</table>

@push('scripts')
    <script>
        (function () {
            var table = document.getElementById('detalhesNoticia');
            var images = table.querySelectorAll('img');

            images.forEach(img => {
                img.style.cursor = 'pointer';

                img.addEventListener('click', () => {
                    var link = document.createElement('a');
                    link.setAttribute('target', '_blank');
                    link.href = img.src;

                    link.click();
                });
            });
        })();
    </script>
@endpush
