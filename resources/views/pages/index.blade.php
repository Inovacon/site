@extends('layouts.app')

@section('title', 'Inovacon Empresa Júnior')

@section('content')
	<div id="noticias" class="mt-3">
    	@include('pages.partials.noticias')
    </div>

    <div id="quemSomos">
    	@include('pages.partials.quem-somos')
    </div>	


	@for($i = 0; $i < 10; $i++)
    <div class="py-5"></div>
    @endfor
@endsection