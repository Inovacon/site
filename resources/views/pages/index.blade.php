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

	<div id="parceiros">
		@include('pages.partials.parceiros')
	</div>

	@for($i = 0; $i < 10; $i++)
    	<div class="py-5"></div>
    @endfor
@endsection