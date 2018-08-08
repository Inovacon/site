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
