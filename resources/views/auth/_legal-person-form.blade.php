<form action="{{ route('register') }}" method="POST">
    @csrf

    <h5 class="pb-1 font-weight-600 text-dark">Dados da empresa</h5>

    <input name="has_cnpj" type="hidden" value="true">

    @include('form.material-input', [
        'id' => 'lp-name',
        'name' => 'trade',
        'value' => old('trade'),
        'label' => 'Nome fantasia',
        'icon' => 'fas fa-id-card',
        'required' => true
    ])

    <div class="row">
        <div class="col">
            @include('form.material-input', [
                'id' => 'lp-company-name',
                'name' => 'name',
                'value' => old('name'),
                'label' => 'Razão social',
                'icon' => 'fas fa-file-contract',
                'required' => true
            ])
        </div>

        <div class="col">
            @include('form.material-input', [
                'id' => 'lp-cnpj',
                'name' => 'cpf_cnpj',
                'value' => old('cpf_cnpj'),
                'label' => 'CNPJ',
                'class' => 'cnpj',
                'icon' => 'fas fa-file-contract',
                'required' => true
            ])
        </div>
    </div>

    <h5 class="pb-1 font-weight-600 text-dark">Dados pessoais</h5>

    <div class="row">
        <div class="col">
            @include('form.material-input', [
                'id' => 'lp-email',
                'name' => 'email',
                'value' => old('email'),
                'label' => 'E-mail',
                'class' => 'email',
                'type' => 'email',
                'icon' => 'fas fa-envelope',
                'required' => true
            ])
        </div>

        <div class="col">
            @include('form.material-input', [
                'id' => 'lp-phone',
                'name' => 'phone',
                'value' => old('phone'),
                'label' => 'Celular',
                'class' => 'phone',
                'type' => 'tel',
                'icon' => 'fas fa-mobile-alt',
                'required' => true
            ])
        </div>
    </div>


    <div class="row">
        <div class="col">
            @include('form.material-input', [
                'id' => 'lp-password',
                'name' => 'password',
                'label' => 'Senha',
                'type' => 'password',
                'icon' => 'fas fa-lock',
                'required' => true
            ])
        </div>

        <div class="col">
            @include('form.material-input', [
                'id' => 'lp-password_confirmation',
                'name' => 'password_confirmation',
                'label' => 'Confirme sua senha',
                'type' => 'password',
                'required' => true
            ])
        </div>
    </div>

    <div class="col px-0">
        @include('form.material-input', [
            'id' => 'lp-birth_date',
            'name' => 'birth_date',
            'value' => old('birth_date'),
            'label' => 'Data de nascimento',
            'class' => 'birth-date',
            'icon' => 'fas fa-calendar-alt',
            'required' => true
        ])
    </div>

    <div class="col px-0 text-gray-dark" style="font-size: .95rem;">
        @include('form.radio-box', [
            'title' => 'Gênero',
            'icon' => 'fas fa-venus-mars',
            'name' => 'gender',
            'radios' => [
                ['id' => 'lp-male', 'label' => 'Masculino', 'value' => 'M'],
                ['id' => 'lp-female', 'label' => 'Feminino', 'value' => 'F'],
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
