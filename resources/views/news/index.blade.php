@extends('layouts.app')

@section('title', 'Eventos - Inovacon')

@section('content')
  <div class="container">
    <div>
      <h4 class="mb-0 font-weight-bold text-dark">
        <i class="fas fa-newspaper fa-lg fa-fw mr-1"></i>ÚLTIMAS NOTÍCIAS
      </h4>
      <hr class="border-primary border-2">
    </div>

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
                    <a href="#" class="link mb-0 text-uppercase font-weight-bold">
                      {{ $faker->sentence(rand(6, 10), true) }}
                    </a>
                  </div>
                </div>

                <div class="card-body pt-0">
                  <p class="small text-muted font-weight-semi-bold">20 Junho 2018</p>
                  <p class="small text-muted my-0">{{ $faker->sentence(rand(3, 6), true) }}</p>
                </div>
              </div>

              <div class="text-right pr-1">
                <i class="fab fa-facebook-f px-1 py-2 text-facebook"></i>
                <i class="fab fa-twitter px-1 py-2 text-twitter"></i>
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