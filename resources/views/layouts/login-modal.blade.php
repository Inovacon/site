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
        <form id="loginForm" action="#" method="POST">
          <div class="form-group">
            <label for="email" class="font-weight-bold"><i class="fas fa-envelope fa-md"></i>&nbsp;&nbsp;E-mail</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email@exemplo.com" required>
          </div>

          <div class="form-group">
            <label for="password" class="font-weight-bold"><i class="fas fa-lock fa-md">&nbsp;&nbsp;</i>Senha</label>
            <input type="password" class="form-control" id="password" placeholder="">
          </div>

          <div class="form-group custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input pointer" id="customCheck1">
            <label class="custom-control-label" for="customCheck1">Manter-se conectado</label>
          </div>

          <button id="btnLogin" type="submit" class="btn btn-primary">Entrar</button>
        </form>
      </div>
    </div>
  </div>
</div>