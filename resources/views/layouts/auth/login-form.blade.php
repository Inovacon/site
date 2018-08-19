<form action="{{ route('login') }}" method="POST">
    @csrf
    
    @if($errors->any())
        @push('scripts')
            <script>
                $('#loginModal').modal();
            </script>
        @endpush
    @endif

    <div class="form-group">
        <div class="form-md-group">
            <input  name="email" 
                    id="email" 
                    value="{{ old('email') }}" 
                    class="form-control md-input {{ old('email') ? 'active' : '' }} {{ $errors->has('email') ? 'is-invalid' : '' }}" 
                    type="email"/>

            <label class="md-label" for="email">
                <i class="fas fa-envelope fa-md mr-1"></i> E-mail
            </label>

            @if($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    {{ $errors->first('email') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="form-md-group">
            <input  name="password" 
                    id="password" 
                    class="form-control md-input {{ $errors->has('password') ? 'is-invalid' : ''}}"  
                    type="password"/>

            <label class="md-label" for="password">
                <i class="fas fa-lock fa-md mr-1"></i> Senha
            </label>

            @if($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    {{ $errors->first('password') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group custom-control custom-checkbox">
        <input  name="remember"
                id="rememberCheck" {{ old('remember') ? 'checked' : '' }}
                class="custom-control-input pointer" 
                type="checkbox"/>

        <label class="custom-control-label text-gray-dark" for="rememberCheck">Manter-se conectado</label>
    </div>

    <div class="d-flex justify-content-between align-items-end">
        <div class="form-group mb-0">
            <div class="form-md-group">
                <button class="btn btn-primary" type="submit">Entrar</button>
            </div>
        </div>
        
        @if(request()->is('login'))
            <p class="text-right small text-secondary">
                Ainda não possui uma conta? <a class="link" href="/register">Cadastre-se</a>.
            </p>
        @endif
    </div>
</form>
