@extends('user.layout')

@section('title', 'Meus dados')

@section('content')

    <form method="POST" action="{{ route('my-account.user.update') }}">
        @csrf
        @method('PATCH')

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="font-weight-600 text-white mb-0"><i class="fas fa-user-edit mr-3"></i>Alterar dados da conta</h4>
            </div>

            <div class="card-body">
                @if(strlen($user->cpf_cnpj) > 11)
                    @include('user.my-account._legal-person-form')
                @else
                    @include('user.my-account._physical-person-form')
                @endif

                <div class="row mt-2">
                    <button type="submit" class="btn font-weight-600 btn-lg btn-success mx-3">Salvar alterações</button>
                    <a href="{{ route('my-account.user.index') }}" class="btn font-weight-600 btn-lg btn-light mx-3">Cancelar</a>
                </div>
            </div>
        </div>
    </form>

    @push('scripts')
        <script>

        // Cleave js masks
        $('.birth-date').each(function() {
            new Cleave(this, {
                date: true,
                datePattern: ['d', 'm', 'Y']
            });
        });

        $('.phone').each(function() {
            new Cleave(this, {
                delimiters: [' ', '-'],
                blocks: [2, 5, 4],
                numericOnly: true
            });
        });

        $('.cpf').each(function() {
            new Cleave(this, {
                delimiters: ['.', '.', '-'],
                blocks: [3, 3, 3, 2],
                numericOnly: true
            });
        });

        $('.cnpj').each(function() {
            new Cleave('.cnpj', {
                delimiters: ['.', '.', '/', '-'],
                blocks: [2, 3, 3, 4, 2],
                numericOnly: true
            });
        });
        </script>
    @endpush
@endsection
