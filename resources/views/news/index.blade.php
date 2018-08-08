@extends('layouts.app')

@section('title', 'Eventos - Inovacon')

@section('content')
  <div class="container">
    <h4 class="mb-0 font-weight-bold text-dark">
      <i class="fas fa-newspaper fa-lg fa-fw mr-1"></i>ÚLTIMAS NOTÍCIAS
    </h4>
    
    <hr class="border-primary border-2">

    <div class="row">
      @for($i = 0; $i < 8; $i++)
        <div class="col-lg-8 mb-3">
          <div class="card">
            <div class="row no-gutters">
              <div class="col-lg-3">
                <a href="#"><img class="card-img-top h-100" src="http://via.placeholder.com/300x150" alt=""></a>
              </div>

              <div class="col">
                <div class="card-header d-flex justify-content-between pb-0 no-gutters">
                  <div class="col">
                    <a href="{{ url('noticias/show') }}" class="link mb-0 text-uppercase font-weight-bold">
                      {{ $faker->sentence(rand(3, 6), true) }}
                    </a>
                  </div>
                </div>

                <div class="card-body pt-0">
                  <p class="small text-primary font-weight-500">
                    {{ rand(0, 31) }} Junho de 2018
                  </p>
                  <p class="small text-muted my-0">{{ $faker->sentence(rand(3, 6), true) }}</p>
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
      @endfor

      <div class="col-lg-4">
        
      </div>
    </div>
  </div>
@endsection
