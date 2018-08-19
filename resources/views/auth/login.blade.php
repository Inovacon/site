@extends('layouts.app')

@section('title', 'Entre | Inovacon')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header bg-primary">
            <h5 class="font-weight-600 text-white mb-0">          
              ENTRE COM SUA CONTA
            </h5>
          </div>  
          
          <hr class="my-0">

          <div class="card-body">
            @include('layouts.auth.login-form')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
