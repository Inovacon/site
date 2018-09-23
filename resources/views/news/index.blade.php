@extends('layouts.app')

@section('title', 'Eventos - Inovacon')

@section('content')
    <div class="container">
        <h4 class="mb-0 font-weight-bold text-dark">
            <i class="fas fa-newspaper fa-lg fa-fw mr-1"></i>ÚLTIMAS NOTÍCIAS
        </h4>

        <hr class="border-primary border-2">

        <div class="row">
            @forelse ($news as $noticia)
                <div class="col-lg-8 mb-3">
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-lg-3">
                                <a href="#">
                                    <img class="card-img-top"
                                         width="180"
                                         height="100"
                                         src="{{ $noticia->publicImagePath }}">
                                </a>
                            </div>

                            <div class="col">
                                <div class="card-header d-flex justify-content-between pb-0 no-gutters">
                                    <div class="col">
                                        <a href="{{ route('news.show', $noticia) }}"
                                           class="link mb-0 text-uppercase font-weight-bold">
                                            {{ $noticia->title }}
                                        </a>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <p class="small text-primary font-weight-500">
                                        {{ $noticia->created_at->format('d/m/Y') }}
                                    </p>
                                    <p class="small text-muted my-0">{{ str_limit($noticia->body, 100) }}</p>
                                </div>
                            </div>

                            <div class="text-right pr-2 pl-1 py-2">
                                <i class="fab fa-facebook-f text-facebook mx-1"></i>
                                <i class="fab fa-twitter text-twitter mx-1"></i>
                                <i class="fab fa-google-plus-g text-google"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning">
                    Não há nenhuma notícia a ser exibida.
                </div>
            @endforelse
        </div>

        <div class="mt-2 mb-5">
            {{ $news->links() }}
        </div>
    </div>
@endsection
