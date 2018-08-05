@extends('layouts.app')

@section('title', 'Painel')

@section('header')
    @include('dashboard._nav')
@endsection

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2><i class="fas fa-tachometer-alt fa-fw"></i> Painel</h2>
        </div>
    </div>
@endsection
