@extends('layouts.app')

@section('title', 'Inovacon Empresa Júnior')

@section('content')
	<div id="noticias">
    	@include('pages.partials.noticias')
    </div>

    <div id="quemSomos">
    	@include('pages.partials.quem-somos')
    </div>	
	
	<div id="servicos">
		@include('pages.partials.servicos')
	</div>

	<div id="ondeEstamos">
		@include('pages.partials.localizacao')
	</div>

	<div id="contato">
		@include('pages.partials.contato')
	</div>
	
	<div id="parceiros">
		@include('pages.partials.parceiros')
	</div>
	
	<div id="rodape">
		@include('pages.partials.rodape')
	</div>
@endsection