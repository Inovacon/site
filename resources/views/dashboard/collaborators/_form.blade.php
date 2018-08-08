@csrf

<div class="row border-bottom py-4">
    <label class="col-md-3 col-form-label font-weight-semi-bold text-gray-dark" for="name">
        Nome Completo
    </label>

    <div class="col-md-6">
        <input type="text"
               class="form-control"
               id="name"
               name="name"
               value="{{ old('name', $collaborator->name) }}"
               required>
    </div>
</div>

<div class="row border-bottom py-4">
    <label class="col-md-3 col-form-label font-weight-semi-bold text-gray-dark" for="email">
        E-mail
    </label>

    <div class="col-md-6">
        <input type="email"
               class="form-control"
               id="email"
               name="email"
               value="{{ old('email', $collaborator->email) }}"
               required>
    </div>
</div>

<div class="row border-bottom py-4">
    <label class="col-md-3 col-form-label font-weight-semi-bold text-gray-dark" for="cpf">
        CPF
    </label>

    <div class="col-md-6">
        <input type="text"
               class="form-control"
               id="cpf"
               name="cpf"
               value="{{ old('cpf', $collaborator->cpf_cnpj) }}"
               required>
    </div>
</div>

<div class="row align-items-center border-bottom py-4">
    <label class="col-md-3 col-form-label font-weight-semi-bold text-gray-dark" for="gender">
        Gênero
    </label>

    <div class="col-md-6">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="masculino" name="gender" value="M" class="custom-control-input" checked>
            <label class="custom-control-label" for="masculino">Masculino</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="feminino" name="gender" value="F" class="custom-control-input">
            <label class="custom-control-label" for="feminino">Feminino</label>
        </div>
    </div>
</div>

<div class="row border-bottom py-4">
    <label class="col-md-3 col-form-label font-weight-semi-bold text-gray-dark" for="birth_date">
        Data de Nascimento
    </label>

    <div class="col-md-6">
        <input type="date"
               class="form-control"
               id="birth_date"
               name="birth_date"
               value="{{ old('birth_date', $collaborator->birth_date) }}"
               required>
    </div>
</div>

<div class="row border-bottom py-4">
    <label class="col-md-3 col-form-label font-weight-semi-bold text-gray-dark" for="password">
        Senha
    </label>

    <div class="col-md-6">
        <input type="password"
               class="form-control"
               id="password"
               name="password"
               required>
    </div>
</div>

<div class="row border-bottom py-4">
    <label class="col-md-3 col-form-label font-weight-semi-bold text-gray-dark" for="password_confirmation">
        Confirme a Senha
    </label>

    <div class="col-md-6">
        <input type="password"
               class="form-control"
               id="password_confirmation"
               name="password_confirmation"
               required>
    </div>
</div>

<div class="row mt-4 text-right">
    <div class="col-md-9">
        <button type="submit" class="btn btn-lg btn-primary ml-2">
            Salvar
        </button>
    </div>
</div>
