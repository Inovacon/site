<form id="loginForm" action="{{ route('login') }}" method="POST">
    @csrf
    
    @if($errors->any())
        @push('scripts')
            <script>
                $('#loginModal').modal();
            </script>
        @endpush
    @endif

    <div class="form-md-group {{ $errors->has('email') ? 'invalid-group' : '' }}">
        <input  name="email" 
                id="email" 
                value="{{ old('email') }}" 
                class="form-control {{ old('email') ? 'active' : '' }}" 
                type="email"
                required/>

        <label for="email">
            <i class="fas fa-envelope mr-1"></i> E-mail
        </label>

        <span class="invalid-md-feedback" role="alert">
            {{ $errors->first('email') }}
        </span>
        <div class="errorBlock">
            
        </div>
    </div>

    <div class="form-md-group {{ $errors->has('password') ? 'invalid-group' : '' }}">
        <input  name="password" 
                id="password" 
                class="form-control"  
                type="password"/>

        <label for="password">
            <i class="fas fa-lock mr-1"></i> Senha
        </label>

        <span class="invalid-md-feedback" role="alert">
            {{ $errors->first('password') }}
        </span>
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
            <button class="btn btn-primary" type="submit">Entrar</button>
        </div>
        
        @if(request()->is('login'))
            <p class="text-right small text-secondary">
                Ainda não possui uma conta? <a class="link" href="/register">Cadastre-se</a>.
            </p>
        @endif
    </div>
</form>

