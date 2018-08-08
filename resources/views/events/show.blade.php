@extends('layouts.app')

@section('title', 'I Simpósio Integrado de Gestão e Conhecimento - Eventos')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="card">
          <div class="card-header">
            <div class="d-flex flex-row justify-content-between">
              <h5 class="text-primary font-weight-bold">
              <i class="fas fa-calendar-alt pr-1"></i>
              I Simpósio Integrado de Gestão e Conhecimento
              </h5>
              <div class="d-flex">
                <i class="fab fa-facebook-f fa-lg text-facebook mx-1"></i>
                <i class="fab fa-twitter fa-lg text-twitter mx-1"></i>
                <i class="fab fa-google-plus-g fa-lg text-google"></i>
              </div>
            </div>
            <hr class="border-primary border-2 my-0">
          </div>
          <div class="card-body no-gutters">
            <div>
              <div class="col-sm-4 float-left" style="z-index: 1;">
                <img class="mr-lg-3 img-thumbnail" src="http://via.placeholder.com/250x145"/>
                <p class="small text-center text-primary my-0">De 20/08 até 24/08</p>
                <div class="text-center text-primary border-bottom border-primary" style="border-width: 2px !important;">
                  <span class="strong">R$45</span>,00 <span class="text-muted small">(todas as noites)</span>
                </div>
              </div>
              <div class="col">
                <div class="text-indent text-justify info" style="font-size: .9rem;">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima at officia, perferendis optio velit quaerat blanditiis non, inventore quae? Et officiis assumenda veniam! Minus modi expedita exercitationem vel illum numquam incidunt dolor. Exercitationem unde autem harum repellendus laboriosam numquam aperiam, ullam quas provident alias obcaecati, delectus cum consequuntur saepe facere natus tempore deserunt quam voluptatum officia esse voluptate. Dolorum ut sed iure repellendus doloremque ipsam distinctio, hic possimus labore illo numquam voluptas in libero blanditiis placeat asperiores sapiente eveniet consequatur fugit quia aut error? Commodi porro adipisci, asperiores provident facere, omnis tempora accusamus dolorem, explicabo nemo nesciunt, nobis suscipit quos.
                </div>
              </div>
            </div>
          </div>

          <div class="my-3"></div>

          <div class="card-body">
            <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-info-content-tab" data-toggle="pill" href="#pills-info-content" role="tab" aria-controls="pills-info-content" aria-selected="true"><i class="fas fa-info-circle mr-2"></i>Informações</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" id="pills-price-tab" data-toggle="pill" href="#pills-price" role="tab" aria-controls="pills-price" aria-selected="false"><i class="fas fa-hand-holding-usd mr-2"></i>Preços</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" id="pills-schedule-tab" data-toggle="pill" href="#pills-schedule" role="tab" aria-controls="pills-schedule" aria-selected="false"><i class="fas fa-clock mr-2"></i>Cronograma</a>
              </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade" id="pills-info-content" role="tabpanel" aria-labelledby="pills-price-tab">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <span class="font-weight-600">
                      <i class="fas fa-comment fa-fw text-primary mr-2"></i>Tema:
                    </span>
                    <span>Novos modelos de negócios com a inovação tecnológica</span>
                  </li>

                    
                  <li class="list-group-item">
                    <span class="font-weight-600">
                      <i class="fas fa-graduation-cap fa-fw text-primary mr-2"></i>Cursos organizadores:
                    </span>
                    <span>Administração, Análise e Desenv. de Sistemas e Ciencias Contábies</span>
                  </li>

                  <li class="list-group-item">
                    <span class="font-weight-600">
                      <i class="fas fa-map-marker-alt fa-fw text-primary mr-2"></i>Local:
                    </span>
                    <span>Faculdade CNEC Santo Ângelo, prédio 6 salão azul</span>
                  </li>
                 
                </ul>
              </div>

              <div class="tab-pane fade" id="pills-price" role="tabpanel" aria-labelledby="pills-price-tab">
                <div class="row d-flex justify-content-center">

                  @for($i = 0; $i < 3; $i++)
                    <div class="col-md-4 my-2">
                      <div class="card bg-light">
                        <div class="card-header">
                          <h6 class="font-weight-600 text-primary text-center">Lorem ipsum dolor</h6>
                          <hr class="my-0">
                        </div>
                        
                        <div class="card-body">
                          <p class="text-center"><span style="font-size: 2.3rem; font-weight: bold">R$40</span>,00</p>
                          <hr class="my-0 border border-2">
                        </div>

                        <div class="card-body text-muted small text-justify">
                          Nesta modalidade...lorem ipsum dolor sit amet, consectetur adipisicing elit. Est, quibusdam!
                        </div>

                        <div class="card-body px-0">
                          <ul class="list-group list-group-flush small text-muted">
                            <li class="list-group-item"><i class="fas fa-check-circle mr-2"></i>Certificação de 20h</li>
                            <li class="list-group-item"><i class="fas fa-check-circle mr-2"></i>Lorem ipsum dolor</li>
                            <li class="list-group-item"><i class="fas fa-check-circle mr-2"></i>Sit amet consectetur</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  @endfor
                </div>
              </div>
              
              <div class="tab-pane fade show active" id="pills-schedule" role="tabpanel" aria-labelledby="pills-schedule-tab">
                <div class="table-responsive">
                  <table class="table">
                    @for($i = 0; $i < 2; $i++)
                      <thead>
                        <tr>
                          <th style="border-bottom-width: 2px !important;"  class="text-center" colspan="2" scope="col"><i class="fas fa-calendar-alt mr-2"></i>2{{ $i }} de Junho</th>
                        </tr>
                        <tr>
                          <th style="min-width: 110px !important;"><i class="fas fa-clock mr-2"></i>Horário</th>
                          <th><i class="fas fa-info-circle mr-2"></i>Programação</th>
                        </tr>
                      </thead>

                      <tbody>
                        @for($j = 0; $j < 5; $j++)
                          <tr>
                            <th scope="row">08h30min</th>
                            <td>{{ $faker->sentence(rand(4, 9), true) }}</td>
                          </tr>
                        @endfor
                      </tbody>
                    @endfor

                  </table>
                </div>
              </div>
            </div>
            
            <div class="mt-5 d-flex flex-column align-items-center">
              <div>
                <button class="mx-2 btn btn-outline-success btn-lg font-weight-bold">
                  <i class="fas fa-plus-circle fa-lg mr-sm-2"></i>INSCREVA-SE
                </button>
                
                <button class="mx-2 btn btn-primary btn-lg font-weight-bold">
                  <i class="fas fa-hand-pointer mr-2"></i>Site do evento
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection