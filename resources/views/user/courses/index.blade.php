@extends('user.layout')

@section('title', 'Cursos')

@section('content')
	<div>
	    <h4 class="font-weight-600 text-gray-dark">Meus cursos</h4>
	</div>
    
    <hr>
	
	<div class="row">
		
		@for($i = 0; $i < 5; $i++)
			<div class="col col-md-4 col-lg-3 mb-4">
				<div class="card">
					<div class="overlay-container">
						<img class="card-img-top" src="https://via.placeholder.com/800x400" alt="">
					</div>

					<a class="link-absolute" href="{{ route('my-courses.show') }}"></a>

					<div class="card-header">
						<div style="font-size: .85rem;" class="d-flex justify-content-between ">
							<div class="mb-0 text-primary text-uppercase font-weight-bold">
								<a class="link" href="{{ route('my-courses.show') }}">Curso de administraçao</a>
							</div>

							<i class="fas fa-user-tie text-primary align-self-center"></i>
						</div>
					</div>

					<div class="card-body text-gray-dark">
						<div class="small my-2"><i class="fas fa-calendar-alt fa-fw mr-1"></i>Adquirido em: 20/02/2000</div>
						{{-- <div class="small my-2"><i class="fas fa-graduation-cap fa-fw mr-1"></i>Administração</div>
						<div class="small my-2"><i class="fas fa-chalkboard-teacher fa-fw mr-1"></i>Presencial</div>
						<div class="small my-2"><i class="fas fa-user-clock fa-fw mr-1"></i>45h</div> --}}
					</div>

					<div class="card-footer p-0"  style="z-index: 1">
						<a href="{{ route('my-courses.show') }}" class="link p-2 text-center d-block text-uppercase" style="font-size: .75rem">
							<span class="font-weight-600"><i class="fas fa-info-circle mr-1"></i>Mais informações</span>
						</a>
					</div>
				</div>
			</div>
		@endfor
	</div>
@endsection