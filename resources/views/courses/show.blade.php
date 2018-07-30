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
				<i class="fas fa-user-tie"></i> Administração de Condomínios
			</h5>
			<hr class="border-primary border-2">
		</div>

		<div class="card">
		


		</div>
	</div>
@endsection