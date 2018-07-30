@extends('layouts.app')

@section('title', 'Inovacon - Eventos')

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
            <div class="card-header">
              <a href="#" class="link">
                <div class="mb-0 text-uppercase font-weight-bold">{{ $faker->words(rand(1, 5), true) }}</div>
              </a>
            </div>

            <div class="card-body">
              <p class="small text-justify text-secondary">{{ $faker->sentence(rand(5, 19), true) }}</p>
            </div>
            
            <hr class="my-0">

            <div class="card-footer p-0">
              <a href="#" class="link p-2 text-center d-block">
                <i class="fas fa-hand-pointer mr-2"></i><span class="font-weight-bold">ACESSAR EVENTO</span>
              </a>
            </div>
          </div>
        </div>
      @endfor

    </div>
  </div>
@endsection