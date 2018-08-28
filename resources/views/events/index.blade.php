@extends('layouts.app')

@section('title', 'Eventos | Inovacon')

@section('content')
  <div class="container">
    <div>
      <h4 class="mb-0 font-weight-bold text-dark">
        <i class="fas fa-calendar-alt fa-lg fa-fw mr-1"></i>EVENTOS
      </h4>

      <hr class="border-primary border-2">
    </div>

    <div id="eventsCard" class="row">
      @for($i = 0; $i < 9; $i++)
        <div class="col-lg-3 col-sm-6 mb-3">
          @include('events._event-card')
        </div>
      @endfor
    </div>
  </div>
@endsection
