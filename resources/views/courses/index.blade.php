@extends('layouts.app')

@section('title', 'Inovacon - Cursos')

@section('content')
  <div class="container">
    <div>
      <h4 class="mb-0 font-weight-bold text-dark">
        <i class="fas fa-graduation-cap fa-lg fa-fw mr-1"></i>CURSOS
      </h4>
      <hr class="border-primary border-2">
    </div>

    <div class="row">
      <div id="sidebarCourses" class="col-md-3">
        <div class="card">
          <div class="card-header bg-primary">
            <h6 class="text-center mb-0 text-white">ÁREAS DE CURSOS</h6>
          </div>
          
          <ul class="list-group list-group-flush">
            <a class="list-group-item list-unstyled d-flex justify-content-between" href="#">
              <li class="text-capitalize"><i class="fas fa-user-tie fa-fw mr-1"></i>Administração</li>
              <span class="badge badge-pill badge-primary align-self-center">14</span>
            </a>

            <a class="list-group-item list-unstyled d-flex justify-content-between" href="#">
              <li class="text-capitalize"><i class="fas fa-dna fa-fw mr-1"></i>Biomedicina</li>
              <span class="badge badge-pill badge-primary align-self-center">4</span>
            </a>

            <a class="list-group-item list-unstyled d-flex justify-content-between" href="#">
              <li class="text-capitalize"><i class="fas fa-calculator fa-fw mr-1"></i>Contábeis</li>
              <span class="badge badge-pill badge-primary align-self-center">8</span>
            </a>

            <a class="list-group-item list-unstyled d-flex justify-content-between" href="#">
              <li class="text-capitalize"><i class="fas fa-balance-scale fa-fw mr-1"></i>Direito</li>
              <span class="badge badge-pill badge-primary align-self-center">3</span>
            </a>
          </ul>
        </div>
      </div>

      <div id="courses" class="col-md-9">
        <div class="row">
            @php
              function getRandomIcon() {
                $icons = [
                  'fas fa-balance-scale',
                  'fas fa-calculator',
                  'fas fa-dna',
                  'fas fa-user-tie'
                ];

                return $icons[rand(0, 3)];
              }
            @endphp

            @for($i = 0; $i < 9; $i++)
              <div class="col-lg-4 col-sm-6 mb-3">
                <div class="card">
                  <img class="card-img-top" src="http://via.placeholder.com/250x145" alt="Card image cap">

                  <div class="card-header">
                    <div class="d-flex justify-content-between">
                      <a href="{{ url('cursos/show') }}" class="link">
                        <div class="mb-0 text-uppercase font-weight-bold">{{ $faker->words(rand(1, 5), true) }}</div>
                      </a>
                      <i class="align-self-start mx-1 {!! getRandomIcon() !!}"></i>
                    </div>
                  </div>


                  <div class="card-body">
                    <p class="small text-justify text-secondary">{{ $faker->sentence(rand(5, 19), true) }}</p>
                  </div>

                  <div class="card-footer d-flex justify-content-between">
                    <div>
                      <i class="fas fa-clock mr-1"></i><strong>20h</strong>
                    </div>

                    <div>
                      <strong>R$45</strong>,<small>00</small>
                    </div>
                  </div>
                  
                  <hr class="my-0">

                  <div class="card-footer p-0">
                    <a href="{{ url('cursos/show') }}" class="link p-2 text-center d-block text-uppercase">
                      <i class="fas fa-plus-circle mr-2"></i><span class="font-weight-bold">Matricule-se</span>
                    </a>
                  </div>
                </div>
              </div>
            @endfor
        </div>
      </div>
    </div>
  </div>
@endsection