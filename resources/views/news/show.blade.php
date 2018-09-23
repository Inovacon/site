@extends('layouts.app')

@section('title', $noticia->title.' - Notícia')

@section('content')

<div id="news" class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="card">
        <div class="card-header">
          <div class="card-header">
            <h5 class="text-primary font-weight-bold">
              <i class="fas fa-newspaper mr-1"></i>
              {{ $noticia->title }}
            </h5>

            <hr class="border-primary border-2 my-0">

            <div class="d-flex justify-content-between mt-2">
              <span class="news-info text-muted align-self-center">
                Publicado em <strong>{{ $noticia->created_at->format('d/m/Y') }}</strong> &bull; {{ $noticia->created_at->format('H:i') }}
              </span>

              <div>
                <i class="fab fa-facebook-f text-facebook fa-lg mx-1"></i>
                <i class="fab fa-twitter text-twitter fa-lg mx-1"></i>
                <i class="fab fa-google-plus-g text-google fa-lg"></i>
              </div>
            </div>
          </div>

          <div class="card-body news-body">
            <img class="img-fluid img-thumbnail" src="{{ $noticia->publicImagePath }}" />

            <p class="text-justify text-indent">{{ $noticia->body }}</p>
          </div>
        </div>
      </div>
    </div>

    <div id="coursesRelated" class="col-sm-4">
      <div class="card">
        <div class="card-header pb-0">
          <h5 class="font-weight-bold text-primary">VEJA TAMBÉM</h5>

          <hr class="my-0 border-primary border-2">
        </div>

        <div class="card-body px-1">
          <ul class="list-group list-group-flush">
            @forelse ($outrasNoticias as $n)
              <li class="list-group-item border-0 p-2">
                <a href="{{ route('news.show', $n) }}" class="link">
                  <div class="row no-gutters">
                    <div class="col-4">
                      <img width="110" height="65" src="{{ $n->publicImagePath }}">
                    </div>

                    <div class="col d-flex flex-column justify-content-around pl-2">
                      <span class="small text-secondary text-uppercase">
                        {{ $n->title }}
                      </span>

                      <span class="small text-muted">
                        {{ $n->created_at->format('d/m/Y') }}
                      </span>
                    </div>
                  </div>
                </a>
              </li>
            @empty
              <div class="pl-2">Não há nada a ser exibido aqui.</div>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
