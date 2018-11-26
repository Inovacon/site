@extends('dashboard.layout')

@section('title', 'Galeria de imagens da notícia')

@section('content')
    <div class="d-flex flex-column flex-md-row text-center text-md-left justify-content-between align-items-center">
        <h4 class="font-weight-600 text-gray-dark mb-3">Galeria</h4>

        <div>
            <button onclick="document.getElementById('newImage').click()" class="btn btn-primary mb-2 mb-md-0">
                <i class="fas fa-plus fa-fw"></i> Adicionar
            </button>

            <form class="d-inline-block" method="POST" action="{{ route('dashboard.news.gallery.store', $noticia) }}" enctype="multipart/form-data">
                @csrf
                <input  id="newImage"
                        class="d-none"
                        type="file"
                        accept="image/*"
                        name="images[]"
                        onchange="this.parentElement.submit()"
                        multiple />
            </form>

            @if (!empty($images))
                <button id="removerImagemAtual" class="btn btn-danger mb-2 mb-md-0">
                    <i class="fas fa-trash fa-fw"></i> Remover imagem atual
                </button>

                <form class="d-inline-block" method="POST" action="{{ route('dashboard.news.gallery.destroy', $noticia) }}">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outline-danger">
                        <i class="fas fa-trash fa-fw"></i> Remover todas
                    </button>
                </form>
            @endif
        </div>
    </div>

    <hr>

    @if (!empty($images))
        <div id="carouselGaleria" class="carousel slide" data-interval="false" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($images as $publicPath)
                    <li data-target="#carouselGaleria"
                        data-slide-to="{{ $loop->index }}"
                        class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($images as $path => $publicPath)
                    <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                        <img class="d-block w-100" src="{{ $publicPath }}" />

                        <form class="d-none" method="POST" action="{{ route('dashboard.news.gallery.destroy', $noticia) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="path" value="{{ $path }}" />
                        </form>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselGaleria" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselGaleria" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>
    @else
        <div class="alert alert-warning">
            Esta notícia não possui imagens de galeria.
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        (function () {
            var btnRemoverImagemAtual = document.getElementById('removerImagemAtual');

            btnRemoverImagemAtual.addEventListener('click', function () {
                document
                    .querySelector('.carousel-item.active form')
                    .submit();
            });
        })();
    </script>
@endpush
