<div class="bg-parallax">
	<div class="container pt-5">
		<h2 class="font-weight-bold mb-5 text-center text-light">Serviços</h2>
		
		<div class="row">
			@php
				$services = [
					[
						'icon' => 'fas fa-pencil-alt',
						'name' => 'Criação de identidade visual e logomarca',
						'description' => 'Definição de um conceito adequado à representação da marca, caracterizando a personalidade da empresa em um símbolo'
					],
					[
						'icon' => 'fas fa-laptop',
						'name' => 'Auxílio na utilização de mídias digitais',
						'description' => 'Acompanhamento para todo e qualquer tipo de divulgação pela internet, como banners de blogs, anúncios no Instagram e no Facebook'
					],
					[
						'icon' => 'fas fa-building',
						'name' => 'Fortalecimento organizacional',
						'description' => 'Elaboram-se, por meio do mapeamento dos processos da empresa, planos, matrizes de responsabilidade e indicadores visando otimizar os métodos de produção e aumentar a eficiência da empresa.'
					],
					[
						'icon' => 'fas fa-chart-area',
						'name' => 'Pesquisa e análise de mercado',
						'description' => 'Faz-se uma análise do mercado e traça-se planos para fortalecer o posicionamento da empresa frente ao público-alvo, alavancando a prospecção de novos consumidores.'
					],
					[
						'icon' => ['fas fa-frown fa-lg', 'fas fa-meh fa-lg', 'fas fa-smile fa-lg'],
						'name' => 'Pesquisa de satisfação de clientes',
						'description' => 'Feita através da ferramenta Google Forms (on line) que pode ser enviada por e-mail ou WhatsApp aos clientes. A pesquisa de satisfação é a melhor forma de saber se os objetivos da marca estão sendo atingidos'
					],
					[
						'icon' => 'fas fa-user-tie',
						'name' => 'Prospecção de novos consumidores',
						'description' => 'Define-se um perfil de empresas ou pessoas que possam enxergar nos serviços e produtos que se oferece algum valor ou alguma maneira de resolver um problema que elas têm e querem ver solucionado o quanto antes'
					],
					[
						'icon' => 'fas fa-project-diagram',
						'name' => 'Melhoramento de layout interno',
						'description' => 'Surge para aprimorar os processos e produtos de uma empresa, oferecendo economia de espaço, reduzindo movimentação e transporte, satisfação do trabalho e diminuindo custos mediante a eficiência produtiva.'
					],
					[
						'icon' => 'fas fa-chalkboard-teacher',
						'name' => 'Treinamento de pessoal',
						'description' => 'Área de pessoas ajuda na implementação de técnicas e políticas efetivas, que favoreçam o alcance dos objetivos de seu empreendimento, desenvolvendo um dos principais ativos das empresas: As pessoas.'
					],
					[
						'icon' => 'fas fa-users',
						'name' => 'Engajamento de equipes',
						'description' => 'Envolve um processo de amadurecimento do profissional e reconhecimento por mérito. Conscientização sobre o negócio e treinamentos sobre os processos e métodos da empresa.'
					],
					[
						'icon' => 'fas fa-calculator',
						'name' => 'Controle financeiro e fluxo de caixa',
						'description' => ''
					],
					[
						'icon' => 'fas fa-hand-holding-usd',
						'name' => 'Formação de preço de vendas',
						'description' => ''
					],
					[
						'icon' => 'fas fa-chart-pie',
						'name' => 'Análise de custos empresariais',
						'description' => 'Faz-se análise dos custos, além de buscar a otimização nos processos das empresas, visando à redução dos custos operacionais ao aumento da produtividade das empresas'
					]
				];
			@endphp

			@foreach ($services as $service)
				<div class="col-md-4 col-lg-3 col-6 mb-3">
					@include('layouts._service-item', [
						'serviceIcon' => $service['icon'],
						'serviceName' => $service['name'],
						'serviceDescription' => $service['description']
					])
				</div>
			@endforeach	
		</div>
	</div>
</div>