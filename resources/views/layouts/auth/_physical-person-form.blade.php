<form action="{{ route('register') }}" method="POST">
    
    <div class="row">
        <div class="col">
            <div class="form-group">
                <div class="form-md-group">
                    <input  name="name" 
                            id="physical-name"
                            value="{{ old('name') }}"
                            class="form-control md-input {{ old('name') ? 'active' : '' }}"
                            type="text"/>

                    <label class="md-label" for="physical-name">
                        <i class="fas fa-id-card fa-lg mr-1"></i> Nome completo
                    </label>
                </div>
            </div>
        </div>
        
        <div class="col">
            <div class="form-group">
                <div class="form-md-group">
                    <input  name="cpf_cnpj"
                            id="physical-cpf"
                            value="{{ old('cpf_cnpj') }}"
                            class="cpf form-control md-input {{ old('cpf_cnpj') ? 'active' : ''}}"
                            type="text"/>

                    <label class="md-label" for="physical-cpf">
                        <i class="fas fa-address-card fa-lg mr-1"></i> CPF
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <div class="form-md-group">
                    <input  name="email"
                            id="lp-email"
                            value="{{ old('email') }}"
                            class="form-control md-input {{ old('name') ? 'active' : '' }}"
                            type="email"/>

                    <label class="md-label" for="lp-email">
                        <i class="fas fa-envelope fa-lg mr-1"></i> E-mail
                    </label>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <div class="form-md-group">
                    <input  name="phone"
                            id="phone"
                            value="{{ old('phone') }}"
                            class="phone form-control md-input {{ old('phone') ? 'active' : '' }}"
                            type="physical-phone" />

                    <label class="md-label" for="physical-phone">
                        <i class="fas fa-mobile-alt fa-lg mr-1"></i> Celular
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <div class="form-md-group">
                    <input  name="password"
                            id="physical-password"
                            class="form-control md-input"
                            type="password"/>

                    <label class="md-label" for="physical-register-password">
                        <i class="fas fa-lock fa-lg mr-1"></i> Senha
                    </label>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <div class="form-md-group">
                    <input  name="password_confirmation" 
                            id="physical-password_confirmation" 
                            class="form-control md-input" 
                            type="password"/>

                    <label class="md-label" for="physical-password_confirmation">Confirme sua senha</label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="form-md-group">
            <input  name="birth_day"
                    value="{{ old('birth_day') }}"
                    id="physical-birth_day"
                    class="birth-day form-control md-input {{ old('name') ? 'active' : '' }}"
                    type="text"/>

            <label class="md-label" for="physical-birth_day">
                <i class="fas fa-calendar-alt fa-lg mr-1"></i>Data de nascimento
            </label>
        </div>
    </div>
</form>