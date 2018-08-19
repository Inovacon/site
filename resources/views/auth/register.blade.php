@extends('layouts.app')

@section('title', 'Cadastre-se | Inovacon')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header bg-primary">
            <h5 class="font-weight-600 text-white mb-0">          
              CADASTRE SEUS DADOS
            </h5>

          </div>
          
          <hr class="mt-0">

          <div class="card-body">
            @include('layouts.auth.register-form')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
