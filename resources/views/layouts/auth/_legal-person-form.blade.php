<form action="{{ route('register') }}" method="POST">
    @csrf
    
    <h5 class="pb-1 font-weight-600 text-dark">Dados da empresa</h5>

    <div class="form-md-group {{ $errors->has('name') ? 'invalid-group' : '' }}">
        <input  name="name"
                id="legal-name"
                value="{{ old('name') }}"
                class="form-control {{ old('name') ? 'active' : '' }}"
                type="text"/>

        <label for="legal-name">
            <i class="fas fa-id-card fa-lg mr-1"></i> Nome fantasia
        </label>

        <span class="invalid-md-feedback">
            {{ $errors->first('name') }}
        </span>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-md-group {{ $errors->has('company-name') ? 'invalid-group' : '' }}">
                <input  name="company-name"
                        id="legal-company-name"
                        value="{{ old('company-name') }}"
                        class="form-control {{ old('company-name') ? 'active' : '' }}"
                        type="text"/>

                <label for="legal-company-name">
                    <i class="fas fa-file-contract fa-lg mr-1"></i> Razão social
                </label>

                <span class="invalid-md-feedback">
                    {{ $errors->first('company-name') }}
                </span>
            </div>
        </div>
        
        <div class="col">
            <div class="form-md-group {{ $errors->has('cpf_cnpj') ? 'invalid-group' : '' }}">
                <input  name="cpf_cnpj"
                        id="legal-cnpj"
                        value="{{ old('cpf_cnpj') }}"
                        class="cnpj form-control {{ old('cpf_cnpj') ? 'active' : ''}}"
                        type="text"/>

                <label for="legal-cnpj">
                    <i class="fas fa-file-contract fa-lg mr-1"></i> CNPJ
                </label>

                <span class="invalid-md-feedback">
                    {{ $errors->first('cpf_cnpj') }}
                </span>
            </div>
        </div>
    </div>

    <h5 class="pb-1 font-weight-600 text-dark">Dados pessoais</h5>

    <div class="row">
        <div class="col">
            <div class="form-md-group {{ $errors->has('email') ? 'invalid-group' : '' }}">
                <input  name="email"
                        id="legal-email"
                        value="{{ old('email') }}"
                        class="form-control {{ old('email') ? 'active' : '' }}"
                        type="email"/>

                <label for="legal-email">
                    <i class="fas fa-envelope fa-lg mr-1"></i> E-mail
                </label>

                <span class="invalid-md-feedback">
                    {{ $errors->first('email') }}
                </span>
            </div>
        </div>

        <div class="col">
            <div class="form-md-group">
                <input  name="phone"
                        id="legal-phone"
                        value="{{ old('phone') }}"
                        class="phone form-control {{ old('phone') ? 'active' : '' }}"
                        type="legal-phone"/>

                <label for="legal-phone">
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
                        id="legal-password"
                        class="form-control"
                        type="password"/>

                <label for="legal-password">
                    <i class="fas fa-lock fa-lg mr-1"></i> Senha
                </label>

                <span class="invalid-md-feedback">
                    {{ $errors->first('password') }}
                </span>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <div class="form-md-group">
                    <input  name="password_confirmation" 
                            id="legal-password_confirmation" 
                            class="form-control" 
                            type="password"/>

                    <label for="legal-password_confirmation">Confirme sua senha</label>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col">
        <div class="form-group">
            <div class="form-md-group">
                <input  name="birth_date"
                        value="{{ old('birth_date') }}"
                        id="legal-birth_date"
                        class="birth-day form-control {{ old('name') ? 'active' : '' }}"
                        type="text"/>

                <label for="legal-birth_date">
                    <i class="fas fa-calendar-alt fa-lg mr-1"></i>Data de nascimento
                </label>

                <span class="invalid-md-feedback">
                    {{ $errors->first('birth_date') }}
                </span>
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
