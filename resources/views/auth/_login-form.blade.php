<form action="{{ route('login') }}" method="POST" id="loginForm" >
    @csrf
    
    @if($errors->any())
        @push('scripts')
            <script>
                $('#loginModal').modal();
            </script>
        @endpush
    @endif

    @include('form.material-input', [
        'name' => 'email',
        'value' => old('email'),
        'label' => 'E-mail',
        'icon' => 'fas fa-envelope',
        'type' => 'email',
        'required' => true
    ])
    
    @include('form.material-input', [
        'name' => 'password',
        'value' => old('password'),
        'label' => 'Senha',
        'icon' => 'fas fa-lock',
        'type' => 'password',
        'required' => true
    ])

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