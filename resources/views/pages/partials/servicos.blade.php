<div class="bg-parallax">
	<div class="container pt-5">
		<h2 class="font-weight-bold mb-5 text-center text-light">Serviços</h2>
		
		<div class="row">
			@php
				$services = [
					[
						'icon' => 'fas fa-pencil-alt',
						'name' => 'Criação de identidade visual e logomarca',
					],
					[
						'icon' => 'fas fa-laptop',
						'name' => 'Auxília na utilização de mídias digitais',
					],
					[
						'icon' => 'fas fa-building',
						'name' => 'Fortalecimento organizacional',
					],
					[
						'icon' => 'fas fa-chart-area',
						'name' => 'Pesquisa e análise de mercado',
					],
					[
						'icon' => ['fas fa-frown fa-lg', 'fas fa-meh fa-lg', 'fas fa-smile fa-lg'],
						'name' => 'Pesquisa de satisfação de clientes',
					],
					[
						'icon' => 'fas fa-user-tie',
						'name' => 'Prospecção de novos consumidores',
					],
					[
						'icon' => 'fas fa-project-diagram',
						'name' => 'Melhoramento de layout interno'
					],
					[
						'icon' => 'fas fa-chalkboard-teacher',
						'name' => 'Treinamento de pessoal'
					],
					[
						'icon' => 'fas fa-users',
						'name' => 'Engajamento de equipes'
					],
					[
						'icon' => 'fas fa-calculator',
						'name' => 'Controle financeiro e fluxo de caixa'
					],
					[
						'icon' => 'fas fa-hand-holding-usd',
						'name' => 'Formação de preço de vendas'
					],
					[
						'icon' => 'fas fa-chart-pie',
						'name' => 'Análise de custos empresariais'
					]
				];
			@endphp

			@foreach ($services as $service)
				<div class="col-md-4 col-lg-3 col-6 mb-3">
					@include('layouts._service-item', [
						'serviceIcon' => $service['icon'],
						'serviceName' => $service['name'],
						'serviceDescription' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore omnis ex qui aperiam temporibus libero enim cum molestiae quae possimus corrupti.'
					])
				</div>
			@endforeach	
		</div>
	</div>
</div>