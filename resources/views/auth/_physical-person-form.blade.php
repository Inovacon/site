<form action="{{ route('register') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col">
            <div class="form-md-group {{ $errors->has('name') ? 'invalid-group' : '' }}">
                <input  name="name"
                        id="physical-name"
                        value="{{ old('name') }}"
                        class="form-control {{ old('name') ? 'active' : '' }}"
                        type="text"
                        required />

                <label for="physical-name">
                    <i class="fas fa-id-card fa-lg mr-1"></i> Nome completo
                </label>

                <span class="invalid-md-feedback">
                    {{ $errors->first('name') }}
                </span>
            </div>
        </div>

        <div class="col">
            <div class="form-md-group {{ $errors->has('cpf_cnpj') ? 'invalid-group' : '' }}">
                <input  name="cpf_cnpj"
                        id="physical-cpf"
                        value="{{ old('cpf_cnpj') }}"
                        class="cpf form-control {{ old('cpf_cnpj') ? 'active' : ''}}"
                        type="text"
                        required />

                <label for="physical-cpf">
                    <i class="fas fa-address-card fa-lg mr-1"></i> CPF
                </label>

                <span class="invalid-md-feedback">
                    {{ $errors->first('cpf_cnpj') }}
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-md-group {{ $errors->has('email') ? 'invalid-group' : '' }}">
                <input  name="email"
                        id="lp-email"
                        value="{{ old('email') }}"
                        class="form-control {{ old('name') ? 'active' : '' }}"
                        type="email"
                        required />

                <label for="lp-email">
                    <i class="fas fa-envelope fa-lg mr-1"></i> E-mail
                </label>

                <span class="invalid-md-feedback">
                    {{ $errors->first('email') }}
                </span>
            </div>
        </div>

        <div class="col">
            <div class="form-md-group {{ $errors->has('phone') ? 'invalid-group' : '' }}">
                <input  name="phone"
                        id="physical-phone"
                        value="{{ old('phone') }}"
                        class="phone form-control {{ old('phone') ? 'active' : '' }}"
                        type="tel" 
                        required />

                <label for="physical-phone">
                    <i class="fas fa-mobile-alt fa-lg mr-1"></i> Celular
                </label>

                <span class="invalid-md-feedback">
                    {{ $errors->first('phone') }}
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-md-group {{ $errors->has('password') ? 'invalid-group' : '' }}">
                <input  name="password"
                        id="physical-password"
                        class="form-control"
                        type="password"
                        required/>

                <label for="physical-password">
                    <i class="fas fa-lock fa-lg mr-1"></i> Senha
                </label>

                <span class="invalid-md-feedback">
                    {{ $errors->first('password') }}
                </span>
            </div>
        </div>

        <div class="col">
            <div class="form-md-group">
                <input  name="password_confirmation"
                        id="physical-password_confirmation"
                        class="form-control"
                        type="password"
                        required/>

                <label for="physical-password_confirmation">
                     Confirme sua senha
                 </label>
            </div>
        </div>
    </div>

    <div class="col px-0">
        <div class="form-md-group {{ $errors->has('birth_date') ? 'invalid-group' : '' }}">
            <input  name="birth_date"
                    value="{{ old('birth_date') }}"
                    id="physical-birth_date"
                    class="birth-day form-control {{ old('name') ? 'active' : '' }}"
                    type="text"
                    required />

            <label for="physical-birth_date">
                <i class="fas fa-calendar-alt fa-lg mr-1"></i> Data de nascimento
            </label>

            <span class="invalid-md-feedback">
                {{ $errors->first('birth_date') }}
            </span>
        </div>
    </div>

    <div class="col px-0">
        <div class="form-group {{ $errors->has('gender') ? 'invalid-group' : '' }}">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="physical-male" name="gender" class="custom-control-input" value="M" checked>
                <label class="custom-control-label" for="physical-male">Masculino</label>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="physical-female" name="gender" class="custom-control-input" value="F">
                <label class="custom-control-label" for="physical-female">Feminino</label>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-self-end">
        <div class="form-group mb-0">
            <button class="btn btn-success" type="submit">Cadastrar-se</button>
        </div>

        <p class="text-right small text-secondary">Já possui uma conta? <a class="link" href="/login">Entre</a>.</p>
    </div>
</form>
