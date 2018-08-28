@extends('layouts.app')

@section('title', 'Inovacon Empresa Júnior')

@section('content')
	<div class="mb-5">
    	@include('pages.partials.noticias')
    </div>

    <div class="mb-5">
    	@include('pages.partials.quem-somos')
    </div>
@endsection