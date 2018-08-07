@extends('layouts.app')

@section('title', 'Nome do Curso - Inovacon')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
              <h5 class="text-primary font-weight-bold">
                <i class="fas fa-user-tie mr-1"></i>
               ADMINISTRAÇÃO DE CONDOMÍNIOS
              </h5>

              <hr class="border-primary border-2 my-0">
            </div>
            
            <div class="card-body text-gray-dark no-gutters">
              <div class="">
                <div class="col-sm-4 float-left" style="z-index: 1;">
                  <img class="mr-lg-3 img-thumbnail" src="http://via.placeholder.com/250x145"/>
                  <p class="small text-center text-primary my-0">Administração | PRESENCIAL</p>
                </div>

                <div class="col">
                  <div class="text-indent text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima at officia, perferendis optio velit quaerat blanditiis non, inventore quae? Et officiis assumenda veniam! Minus modi expedita exercitationem vel illum numquam incidunt dolor. Exercitationem unde autem harum repellendus laboriosam numquam aperiam, ullam quas provident alias obcaecati, delectus cum consequuntur saepe facere natus tempore deserunt quam voluptatum officia esse voluptate. Dolorum ut sed iure repellendus doloremque ipsam distinctio, hic possimus labore illo numquam voluptas in libero blanditiis placeat asperiores sapiente eveniet consequatur fugit quia aut error? Commodi porro adipisci, asperiores provident facere, omnis tempora accusamus dolorem, explicabo nemo nesciunt, nobis suscipit quos.
                  </div>
                </div>
              </div>

            </div>
            
            <div class="card-body">
              <hr>
              <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-info-content-tab" data-toggle="pill" href="#pills-info-content" role="tab" aria-controls="pills-info-content" aria-selected="true"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;Informações</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" id="pills-programmatic-content-tab" data-toggle="pill" href="#pills-programmatic-content" role="tab" aria-controls="pills-programmatic-content" aria-selected="false"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;Conteúdo Programático</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" id="pills-advantages-tab" data-toggle="pill" href="#pills-advantages" role="tab" aria-controls="pills-advantages" aria-selected="false"><i class="fas fa-check"></i>&nbsp;&nbsp;Vantagens</a>
                </li>
              </ul>

              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade  show active" id="pills-info-content" role="tabpanel" aria-labelledby="pills-programmatic-content-tab">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <span class="font-weight-semi-bold">
                        <i class="fas fa-clock fa-fw text-primary mr-1"></i>Turno:
                      </span>
                      <span>Manhã</span>
                    </li>

                    <li class="list-group-item">
                      <span class="font-weight-semi-bold">
                        <i class="fas fa-user-clock fa-fw text-primary mr-1"></i>Carga Horária:
                      </span>
                      <span>20h</span>
                    </li>

                    <li class="list-group-item">
                      <span class="font-weight-semi-bold">
                        <i class="fas fa-calendar-alt fa-fw text-primary mr-1"></i>Duração:
                      </span>
                      <span>De <span class="font-weight-semi-bold">20/05/2018</span> até <span class="font-weight-semi-bold">15/06/2018</span></span>
                    </li>

                    <li class="list-group-item">
                      <span class="font-weight-semi-bold">
                        <i class="fas fa-graduation-cap fa-fw text-primary mr-1"></i>Tipo de curso:
                      </span>
                      <span>Curta duração</span> 
                    </li>

                    <li class="list-group-item">
                      <span class="font-weight-semi-bold">
                        <i class="fas fa-users fa-fw text-primary mr-1"></i>Público alvo:
                      </span>
                      <span>Estudantes</span>
                    </li>

                  </ul>
                </div>

                <div class="tab-pane fade" id="pills-programmatic-content" role="tabpanel" aria-labelledby="pills-programmatic-content-tab">
                  <ul class="list-group list-group-flush font-weight-semi-bold">
                    @for($i = 0; $i < 10; $i++)
                      <li class="list-group-item">
                        <i class="fas fa-angle-double-right fa-sm text-primary px-2"></i></i>{{ $faker->sentence(rand(3, 9), true) }}
                      </li>
                    @endfor
                  </ul>
                </div>
                
                <div class="tab-pane fade" id="pills-advantages" role="tabpanel" aria-labelledby="pills-advantages-tab">
                  <ul class="list-group list-group-flush font-weight-semi-bold">
                    @for($i = 0; $i < 5; $i++)
                      <li class="list-group-item">
                        <i class="fas fa-check fa-sm text-primary px-2"></i>{{ $faker->sentence(rand(3, 9), true) }}
                      </li>
                    @endfor
                  </ul>
                </div>
              </div>
              
              <div class="mt-5 text-center">
                <button class="btn btn-outline-success btn-lg text-center font-weight-bold">
                  <i class="fas fa-plus-circle fa-lg mr-sm-2"></i>MATRICULE-SE
                </button>
              </div>
            </div>
            
        </div>
      </div>

      <div id="coursesRelated" class="col-sm-4">
        <div class="card">
          <div class="card-header pb-0">
            <h5 class="font-weight-bold text-primary">
              <i class="fas fa-graduation-cap mr-1"></i>CURSOS RELACIONADOS
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
                        <span class="font-weight-semi-bold small text-secondary text-uppercase">
                          {{ str_limit($faker->sentence(rand(3, 5), true), 45) }}
                        </span>
                        
                        <span class="small text-muted">
                          <i class="fas fa-clock"></i> MANHÃ
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