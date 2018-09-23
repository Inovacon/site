@extends('dashboard.layout')

@section('title', 'Detalhes da Notícia')

@section('content')
    <div>
        <h4 class="font-weight-600 text-gray-dark mb-3">
            Detalhes da Notícia
        </h4>

        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between mb-4">
            <a href="{{ route('dashboard.news.index') }}"
               class="btn btn-outline-primary align-self-start mb-3 mb-sm-0">Voltar</a>

            <div class="d-flex align-self-start align-items-center">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle"
                            type="button"
                            id="dropdownMenuButton"
                            data-toggle="dropdown">
                        <i class="fas fa-cog"></i> Opções
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('dashboard.news.edit', $noticia) }}">
                            <i class="fas fa-pencil-alt fa-fw"></i> Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="card">
            <div class="card-body">
                @include('dashboard.news._details')
            </div>
        </div>
    </div>
@endsection
