@extends('user.layout')

@section('title', 'Nome do curso - Minha conta')

@section('content')

	<div>
		<h4 class="font-weight-600 text-gray-dark">Curso de administração</h4>
	</div>
	
	<hr>

	<div class="accordion" id="accordionCourses">
		<div class="my-3">
			@include('user.courses._card-info')
		</div>

		<div class="my-3">
			@include('user.courses._card-classes')
		</div>
	</div>
@endsection