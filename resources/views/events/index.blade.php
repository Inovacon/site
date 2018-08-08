@extends('layouts.app')

@section('title', 'Eventos - Inovacon')

@section('content')
  <div class="container">
    <div>
      <h4 class="mb-0 font-weight-bold text-dark">
        <i class="fas fa-calendar-alt fa-lg fa-fw mr-1"></i>EVENTOS
      </h4>
      <hr class="border-primary border-2">
    </div>

    <div class="row">

      @for($i = 0; $i < 9; $i++)
        <div class="col-lg-3 mb-3">
          <div class="card">
            <img class="card-img-top" src="http://via.placeholder.com/250x145" alt="">

              <div class="card-img-overlay p-0">
                
                <div class="hidden-overlay">
                  <div class="overlay-content">
                    <p class="font-weight-600 text-center">
                      <i class="fas fa-hand-pointer fa-lg mx-2"></i>VER EVENTO
                    </p>
                  </div>
                  <a href="{{ url('eventos/show') }}"></a>
                </div>
              </div>

            <div class="card-header">
              <div class="text-primary mb-0 text-uppercase font-weight-bold">{{ $faker->words(rand(1, 5), true) }}</div>
              <div class="text-muted small font-weight-bold">DE 20/08 ATÉ 24/08</div>
            </div>

            <div class="card-body">
              <p class="small text-justify text-secondary">{{ $faker->sentence(rand(5, 19), true) }}</p>
            </div>
            
            <div class="card-footer p-0">
              <a href="{{ url('eventos/show') }}" class="link p-2 text-center d-block">
                <i class="fas fa-plus-circle mr-2"></i><span class="font-weight-bold">INSCREVA-SE</span>
              </a>
            </div>
          </div>
        </div>
      @endfor

    </div>
  </div>
@endsection