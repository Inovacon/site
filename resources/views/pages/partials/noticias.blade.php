<div class="container">
  <div class="row no-gutters">
    <div class="col col-lg-6 pr-lg-1">
      <div id="carouselNews" class="carousel slide carousel-fade " data-ride="carousel" data-interval="4000">
        <ol class="carousel-indicators">
          @foreach ($leadingNews as $news)
            <li data-target="#carouselNews"
                data-slide-to="{{ $loop->index }}"
                class="{{ $loop->first ? 'active' : '' }}"></li>
          @endforeach
        </ol>

        <div class="carousel-inner">
          @foreach ($leadingNews as $news)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
              <img class="d-block w-100" height="280" src="{{ $news->publicImagePath }}">

              <a href="{{ route('news.show', $news) }}">
                <div class="carousel-caption d-none d-md-block">
                  <div class="text-center title">{{ $news->title }}</div>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <div id="secondaryNews" class="d-none d-lg-block col-lg-6 pl-1">
      <div class="row no-gutters">
        @foreach ($regularNews as $news)
          <div class="col-lg-6">
            <div class="card box-shadow border-0 text-white mb-2 mr-2">
              <img class="card-img" width="270" height="136" src="{{ $news->publicImagePath }}">

              <div class="card-img-overlay d-flex p-0">
                <a href="{{ route('news.show', $news) }}" class="align-self-end text-white bg-op-black px-2 w-100">
                  <h6 class="title">{{ $news->title }}</h6>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <div class="d-none d-md-block text-right small">
      <a href="/noticias" class="link pr-2">
        Mais notícias
      </a>
    </div>
  </div>
</div>
