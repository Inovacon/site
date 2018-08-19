<div class="form-group">
    <div class="form-md-group">
        <input  name="email" 
                id="email" 
                value="{{ old('email') }}" 
                class="form-control md-input {{ old('email') ? 'active' : '' }}" 
                type="email"/>

        <label class="md-label" for="email">
            <i class="fas fa-envelope fa-md mr-1"></i> E-mail
        </label>
    </div>
</div>

<div class="form-group">
    <div class="form-md-group">
        <input  name="password" 
                id="password" 
                class="form-control md-input"  
                type="password"/>

        <label class="md-label" for="password">
            <i class="fas fa-lock fa-md mr-1"></i> Senha
        </label>
    </div>
</div>

<div class="form-group custom-control custom-checkbox">
    <input  name="remember"
            id="rememberCheck" {{ old('remember') ? 'checked' : '' }}
            class="custom-control-input pointer" 
            type="checkbox"/>

    <label class="custom-control-label text-gray-dark" for="rememberCheck">Manter-se conectado</label>
</div>

<div class="form-group mb-0">
    <button id="btnLogin" type="submit" class="btn btn-primary">Entrar</button>
</div>
