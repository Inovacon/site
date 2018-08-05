<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Entre com sua conta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="loginForm" action="{{ route('login') }}" method="POST">
          @csrf

          <div class="form-group">
            <label for="email" class="font-weight-bold"><i class="fas fa-envelope fa-md"></i>&nbsp;&nbsp;E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email@exemplo.com" value="{{ old('email') }}" required>
          </div>

          <div class="form-group">
            <label for="password" class="font-weight-bold"><i class="fas fa-lock fa-md">&nbsp;&nbsp;</i>Senha</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>

          <div class="form-group custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input pointer" id="customCheck1" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label" for="customCheck1">Manter-se conectado</label>
          </div>

          <button id="btnLogin" type="submit" class="btn btn-primary">Entrar</button>
        </form>
      </div>
    </div>
  </div>
</div>