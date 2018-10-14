<form action="{{ route('register') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col">
            @include('form.material-input', [
                'id' => 'pp-name',
                'name' => 'name',
                'label' => 'Nome completo',
                'value' => old('name'),
                'icon' => 'fas fa-id-card',
                'required' => true
            ])
        </div>

        <div class="col">
            @include('form.material-input', [
                'id' => 'pp-cpf',
                'name' => 'cpf_cnpj',
                'label' => 'CPF',
                'class' => 'cpf',
                'value' => old('cpf_cnpj'),
                'icon' => 'fas fa-address-card',
                'required' => true
            ])
        </div>
    </div>

    <div class="row">
        <div class="col">
            @include('form.material-input', [
                'id' => 'pp-email',
                'name' => 'email',
                'label' => 'E-mail',
                'value' => old('email'),
                'type' => 'email',
                'icon' => 'fas fa-envelope',
                'required' => true
            ])
        </div>

        <div class="col">
            @include('form.material-input', [
                'id' => 'pp-phone',
                'name' => 'phone',
                'label' => 'Celular',
                'class' => 'phone',
                'value' => old('phone'),
                'type' => 'tel',
                'icon' => 'fas fa-mobile-alt',
                'required' => true
            ])
        </div>
    </div>

    <div class="row">
        <div class="col">
            @include('form.material-input', [
                'id' => 'pp-password',
                'name' => 'password',
                'label' => 'Senha',
                'type' => 'password',
                'icon' => 'fas fa-lock',
                'required' => true
            ])
        </div>

        <div class="col">
            @include('form.material-input', [
                'id' => 'phyiscal-password_confirmation',
                'name' => 'password_confirmation',
                'label' => 'Confirme sua senha',
                'type' => 'password',
                'required' => true
            ])
        </div>
    </div>

    <div class="col px-0">
        @include('form.material-input', [
            'id' => 'pp-birth_date',
            'name' => 'birth_date',
            'label' => 'Data de nascimento',
            'class' => 'birth-date',
            'icon' => 'fas fa-calendar-alt',
            'required' => true
        ])
    </div>

    <div style="font-size: .95rem" class="col px-0 text-gray-dark">
        @include('form.radio-box', [
            'title' => 'Gênero',
            'name' => 'gender',
            'icon' => 'fas fa-venus-mars',
            'radios' => [
                ['id' => 'legal-male', 'label' => 'Masculino', 'value' => 'M'],
                ['id' => 'legal-female', 'label' => 'Feminino', 'value' => 'F']
            ]
        ])
    </div>

    <div class="d-flex justify-content-between align-self-end">
        <div class="form-group mb-0">
            <button class="btn btn-success" type="submit">Cadastrar-se</button>
        </div>

        <p class="text-right small text-secondary">Já possui uma conta? <a class="link" href="/login">Entre</a>.</p>
    </div>
</form>
