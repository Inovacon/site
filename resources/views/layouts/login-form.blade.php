<form action="{{ route('login') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="login-email" class="font-weight-600 small"><i class="fas fa-envelope fa-md mr-1"></i>E-MAIL</label>
    <input type="email" class="form-control" id="login-email" name="email" placeholder="email@exemplo.com" value="{{ old('email') }}" required>
  </div>

  <div class="form-group">
    <label for="login-password" class="font-weight-600 small"><i class="fas fa-lock fa-md mr-1"></i>SENHA</label>
    <input type="password" class="form-control" id="login-password" name="password">
  </div>

  <div class="form-group custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input pointer" id="customCheck1" name="remember" {{ old('remember') ? 'checked' : '' }}>
    <label class="custom-control-label" for="customCheck1">Manter-se conectado</label>
  </div>
  
  <div class="form-group mb-0">
    <button id="btnLogin" type="submit" class="btn btn-primary">Entrar</button>
  </div>
</form>
