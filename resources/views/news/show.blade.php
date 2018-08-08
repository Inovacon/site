@extends('layouts.app')

@section('title', 'Curso de Odontologia da CNEC Santo Ângelo reinicia os atendimentos à comunidade - Notícia')

@section('content')
  
  <div id="news" class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="card">
          <div class="card-header">
            <div class="card-header">
              <h5 class="text-primary font-weight-bold">
                <i class="fas fa-newspaper mr-1"></i>
                Curso de Odontologia da CNEC Santo Ângelo reinicia os atendimentos à comunidade
              </h5>

              <hr class="border-primary border-2 my-0">

              <div class="d-flex justify-content-between mt-2">
                <span class="news-info text-muted align-self-center">
                  Publicado em <strong>20 Junho 2018</strong> &bull; 15h35
                </span>

                <div>
                  <i class="fab fa-facebook-f text-facebook fa-lg mx-1"></i>
                  <i class="fab fa-twitter text-twitter fa-lg mx-1"></i>
                  <i class="fab fa-google-plus-g text-google fa-lg"></i>
                </div>
              </div>
            </div>

            <div class="card-body news-body">
              <img class="img-fluid img-thumbnail" src="http://via.placeholder.com/800x400" alt="">
              <p class="my-2 small text-muted text-center">{{ $faker->sentence(10, true) }}</p>

              <p class="text-justify text-indent">{{ $faker->sentence(rand(60, 150), true) }}</p>
              <p class="text-justify text-indent">{{ $faker->sentence(rand(60, 150), true) }}</p>
              <p class="text-justify text-indent">{{ $faker->sentence(rand(60, 150), true) }}</p>
            </div>

            <div class="card-footer">
              <div class="small">Colaborador: {{ $faker->name }}</div>
            </div>
          </div>
        </div>
      </div>

      <div id="coursesRelated" class="col-sm-4">
        <div class="card">
          <div class="card-header pb-0">
            <h5 class="font-weight-bold text-primary">
              VEJA TAMBÉM
            </h5>

            <hr class="my-0 border-primary border-2">
          </div>

          <div class="card-body px-1">
            <ul class="list-group list-group-flush">
              @for($i = 0; $i < 5; $i++)
                <li class="list-group-item border-0 p-2">
                  <a href="{{ url('cursos/show') }}" class="link">
                    <div class="row no-gutters">
                      <div class="col-4">
                        <img class="img-fluid" src="http://via.placeholder.com/250x145" alt="">
                      </div>

                      <div class="col d-flex flex-column justify-content-around pl-2">
                        <span class="font-weight-bold small text-secondary text-uppercase">
                          {{ str_limit($faker->sentence(rand(3, 5), true), 45) }}
                        </span>
                        
                        <span class="small text-muted">
                          20 Junho 2018
                        </span>
                      </div>
                    </div>
                  </a>
                </li>
              @endfor
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection