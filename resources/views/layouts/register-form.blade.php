<form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
  @csrf
  
  <div class="form-group">
    <label class="text-uppercase small font-weight-600" for="name"><i class="fas fa-id-card-alt mr-1"></i>Nome completo:</label>
    <input name="name" id="name" class="form-control" type="text">
  </div>

  <div class="form-group">
    <label class="text-uppercase small font-weight-600" for="register-email"><i class="fas fa-envelope mr-1"></i>E-mail:</label>
    <input name="email" id="register-email" class="form-control" type="email">
  </div>
  
  <div class="row">
    <div class="form-group col">
      <label class="text-uppercase small font-weight-600" for="register-password"><i class="fas fa-lock mr-1"></i>Senha:</label>
      <input name="password" id="register-password" class="form-control" type="password">
    </div>

    <div class="form-group col">
      <label class="text-uppercase small font-weight-600" for="password_confirmation">Confirme sua senha:</label>
      <input name="password_confirmation" id="password_confirmation" class="form-control" type="password">
    </div>
  </div>
  
  <div class="form-group">
    <label class="text-uppercase small font-weight-600" for="cpf_cnpj"><i class="fas fa-address-card mr-1"></i>CPF/CNPJ:</label>
    <input name="cpf_cnpj" id="cpf_cnpj" class="form-control" type="text">
  </div>

  <div class="form-group d-flex justify-content-between">
    <span class="font-weight-600 small"><i class="fas fa-venus-mars mr-1"></i>GENERO: </span>

    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" value="male" id="male" name="gender" class="custom-control-input">
      <label class="custom-control-label" for="male">Masculino</label>
    </div>

    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" value="female" id="female" name="gender" class="custom-control-input">
      <label class="custom-control-label" for="female">Feminino</label>
    </div>
  </div>

  <div class="form-group">
    <label class="text-uppercase small font-weight-600" for="birth_day"><i class="fas fa-calendar-alt mr-1"></i>DATA DE NASCIMENTO:</label>
    <input name="birth_day" id="birth_day" class="form-control" type="date">
  </div>
  
  <div class="form-group mb-0">
    <button class="btn btn-success"><i class="fas fa-check mr-1"></i>Cadastrar-se</button>
  </div>
</form>
