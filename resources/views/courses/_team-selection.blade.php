@extends('layouts.app')

@section('title', 'Seleção de turma | Nome do curso')

@section('content')
	
	<div class="container">
		<div class="col-sm-6 mt-5 mx-auto">
			<div class="card">
				<div class="card-header bg-primary text-white">
					<h5 class="mb-0 font-weight-600"><i class="fas fa-graduation-cap mr-1"></i>CONCLUSÃO DE COMPRA</h5>
				</div>
				
				<div class="overlay-container">
					<img style="object-fit: cover;" class="card-img-top" height="200" src="{{ asset('images/default-course.jpg') }}" alt="">

					<div class="overlay-content d-flex flex-column justify-content-center align-items-center">
						<h1 class="mx-auto text-white font-weight-bold text-shadow">R$50</h1>
						<div class="lead text-white text-shadow">Curso de administração de coisas</div>
					</div>
				</div>
				
				<form action="POST">
					<div class="card-body">
						<div class="form-group">
							<h5 class="font-weight-600">Selecione sua turma: </h5>
						</div>
						<div class="form-group">
							<div class="custom-control custom-radio">
								<input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
								<label class="custom-control-label" for="customRadio1">
									<span class="font-weight-600">Turma 1</span> - Aulas das 7h30min até 10h30min
								</label>
							</div>
						</div>		
						
						<div class="form-group">
							<div class="custom-control custom-radio">
								<input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
								<label class="custom-control-label" for="customRadio2">
									<span class="font-weight-600">Turma 2</span> - Aulas das 13h30min até 17h10min
								</label>
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-lg btn-success btn-block font-weight-bold">
						<i class="fas fa-check-circle mr-1 fa-lg"></i> Concluir compra
					</button>
				</form>
			</div>
		</div>
	</div>
@endsection
