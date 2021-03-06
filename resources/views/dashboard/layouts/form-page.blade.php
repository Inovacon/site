@extends('dashboard.layout')

@section('title', $title)

@section('content')
    <div>
        <h3 class="font-weight-bold text-dark">{{ $title }}</h3>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body p-4">
                    <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
                        @csrf
                        @method($method ?? 'POST')

                        {{ $slot }}

                        @if (!isset($showButton) || isset($showButton) && $showButton)
                            @component('dashboard.form.button')
                                Salvar
                            @endcomponent
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
