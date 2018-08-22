@extends('dashboard.layout')

@section('title', 'Cadastrar Aula')

@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="px-sm-4 bg-primary-darker text-white">
                    <div class="card-header bg-primary-darker pb-2">
                        <h5>Cadastrar Aula</h5>
                    </div>
                </div>

                <div class="px-sm-4 pt-3">
                    <div class="card-body">
                        <nav-tabs :fill="false">
                            <tab-pane title="Uma" :active="true">
                                <form method="POST" action="{{ route('dashboard.courses.lessons.store', $team) }}">
                                    @include('dashboard.lessons._form')
                                </form>
                            </tab-pane>

                            <tab-pane title="Todas">
                                <form method="POST" action="{{ route('dashboard.courses.lessons.store', $team) }}">
                                    @include('dashboard.lessons._special-form')
                                </form>
                            </tab-pane>
                        </nav-tabs>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
