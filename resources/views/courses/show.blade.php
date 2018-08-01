@extends('layouts.app')

@section('title', 'Curso - Nome do Curso')

@section('content')
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

  <div class="container mt-4">
    <div>
        <h5 class="mb-0 font-weight-bold text-dark">
      <i class="fas fa-user-tie"></i> CURSO - Administração de condomínios
        </h5>
        <hr class="border-primary border-2">
    </div>
    
    <div class="row no-gutters">
      <div class="card">
        <img class="card-img-top" src="http://via.placeholder.com/250x145" alt="Card image cap">
        
        <ul class="list-group">
          <li class="list-group-item">
            <span class="font-weight-semi-bold">Área: </span>
          </li>

          <li class="list-group-item">
            <span class="font-weight-semi-bold">Modalide:</span>
          </li>

          <li class="list-group-item">
            <span class="font-weight-semi-bold">Carga Horária:</span>
          </li>

          <li class="list-group-item">
            <span class="font-weight-semi-bold">Data de início:</span>
          </li>

          <li class="list-group-item">
            <span class="font-weight-semi-bold">Data de termino:</span>
          </li>

          <li class="list-group-item">
            <span class="font-weight-semi-bold">Turno:</span>
          </li>

          <li class="list-group-item">
            <span class="font-weight-semi-bold">Tipo de curso:</span>
          </li>

          <li class="list-group-item">
            <span class="font-weight-semi-bold">Público alvo:</span>
          </li>
        </ul>

        {{-- 
          Área
          Modalidade
          Carga Horária
          Data Início
          Data Final
          Turno
          Tipo de Curso
          Público Alvo
         --}}
        
        <hr class="my-0">
      </div>

      <div class="card"></div>
    </div>
  </div>
@endsection