@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h5 class="font-weight-600">          
            <i class="fas fa-id-card fa-fw mr-2 fa-lg"></i>
            Cadastre seus dados
          </h5>
        </div>

        <div class="card-body">
          @include('layouts.register-form')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
