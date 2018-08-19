<h5>Dados da empresa</h5>

<div class="form-group">
    <div class="form-md-group">
        <input  name="name"
                id="legal-name"
                value="{{ old('name') }}"
                class="form-control md-input {{ old('name') ? 'active' : '' }}"
                type="text"/>

        <label class="md-label" for="legal-name">
            <i class="fas fa-id-card fa-lg mr-1"></i> Nome fantasia
        </label>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-md-group">
            <input  name="company-name"
                    id="legal-company-name"
                    value="{{ old('company-name') }}"
                    class="form-control md-input {{ old('company-name') ? 'active' : '' }}"
                    type="text"/>

            <label class="md-label" for="legal-company-name">
                <i class="fas fa-file-contract fa-lg mr-1"></i> Razão social
            </label>
        </div>
    </div>
    
    <div class="col">
        <div class="form-group">
            <div class="form-md-group">
                <input  name="cpf_cnpj"
                        id="legal-cnpj"
                        value="{{ old('cpf_cnpj') }}"
                        class="cnpj form-control md-input {{ old('cpf_cnpj') ? 'active' : ''}}"
                        type="text"/>

                <label class="md-label" for="legal-cnpj">
                    <i class="fas fa-file-contract fa-lg mr-1"></i> CNPJ
                </label>
            </div>
        </div>
    </div>
</div>

<h5>Dados pessoais</h5>

<div class="row">
    <div class="col">
        <div class="form-group">
            <div class="form-md-group">
                <input  name="email"
                        id="legal-email"
                        value="{{ old('email') }}"
                        class="form-control md-input {{ old('name') ? 'active' : '' }}"
                        type="email"/>

                <label class="md-label" for="legal-email">
                    <i class="fas fa-envelope fa-lg mr-1"></i> E-mail
                </label>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <div class="form-md-group">
                <input  name="phone"
                        id="legal-phone"
                        value="{{ old('phone') }}"
                        class="phone form-control md-input {{ old('phone') ? 'active' : '' }}"
                        type="legal-phone" />

                <label class="md-label" for="legal-phone">
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
                        id="legal-password"
                        class="form-control md-input"
                        type="password"/>

                <label class="md-label" for="legal-password">
                    <i class="fas fa-lock fa-lg mr-1"></i> Senha
                </label>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <div class="form-md-group">
                <input  name="password_confirmation" 
                        id="legal-password_confirmation" 
                        class="form-control md-input" 
                        type="password"/>

                <label class="md-label" for="legal-password_confirmation">Confirme sua senha</label>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="form-md-group">
        <input  name="birth_day"
                value="{{ old('birth_day') }}"
                id="legal-birth_day"
                class="birth-day form-control md-input {{ old('name') ? 'active' : '' }}"
                type="text"/>

        <label class="md-label" for="legal-birth_day">
            <i class="fas fa-calendar-alt fa-lg mr-1"></i>Data de nascimento
        </label>
    </div>
</div>
