@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h5 class="font-weight-600">          
            <i class="fas fa-user fa-fw mr-2 fa-lg"></i>
            Entre com sua conta
          </h5>
        </div>

        <div class="card-body">
          @include('layouts.login-form')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
