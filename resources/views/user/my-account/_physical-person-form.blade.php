<div class="row my-4">
	<div class="col">
	    <div class="form-group">
	    	<label class="text-gray-dark font-weight-bold" for="">
	    		<i class="fas fa-id-card mr-2"></i>Nome completo: 
	    	</label>
	    	<input class="form-control" name="name" type="text" value="{{ $user->name }}">
	    </div>
	 </div>
	
	<div class="col">
	    <div class="form-group">
	    	<label class="text-gray-dark font-weight-bold" for="">
	    		<i class="fas fa-envelope mr-2"></i>E-mail: 
	    	</label>
	    	<input class="form-control" name="email" type="text" value="{{ $user->email }}">
	    </div>
	</div>
</div>

<div class="row my-4">
	<div class="col">
		<div class="form-group">
			<label class="text-gray-dark font-weight-bold" for="">
				<i class="fas fa-mobile-alt mr-2"></i>Celular:
			</label>
			<input class="form-control phone" name="phone" type="text" value="{{ $user->phone }}">
		</div>
	</div>

	<div class="col">
		<div class="form-group">
			<label class="text-gray-dark font-weight-bold" for="">
				<i class="fas fa-address-card mr-2"></i>CPF: 
			</label>
			<input class="form-control cpf" name="cpf_cnpj" type="text" disabled value="{{ $user->cpf_cnpj }}">
		</div>
	</div>
</div>

<div class="row my-4">
	<div class="col">
		<div class="form-group">
			<label class="text-gray-dark font-weight-bold" for="">
				<i class="fas fa-calendar-alt mr-2"></i>Data de nascimento:
			</label>
			<input class="form-control birth-date" name="birth_date" type="text" value="{{ $user->birth_date }}">
		</div>
	</div>
</div>

<div class="row my-4">
	<div class="col">
		<label class="text-gray-dark font-weight-bold"> <i class="fas fa-venus-mars mr-2"></i>Gênero:</label>
	
		<div>
			<div class="custom-control custom-radio custom-control-inline">
				<input type="radio" id="customRadioMale" name="gender" {{ $user->gender == 'M' ? 'checked' : '' }} class="custom-control-input">
				<label class="text-gray-dark custom-control-label" for="customRadioMale">Masculino</label>
			</div>

			<div class="custom-control custom-radio custom-control-inline">
				<input type="radio" id="customRadioFemale" name="gender" {{ $user->gender == 'F' ? 'checked' : '' }} class="custom-control-input" >
				<label class="text-gray-dark custom-control-label" for="customRadioFemale">Feminino</label>
			</div>
		</div>
	</div>
</div>

<div class="row my-4">
	<div class="col">
		<div class="form-group">
			<label class="text-gray-dark font-weight-bold" for="">
				<i class="fas fa-lock mr-2"></i>Senha antiga:
			</label>
			<input name="old_password" class="form-control" type="password">
		</div>
	</div>
</div>

<div class="row my-4">
	<div class="col">
		<div class="form-group">
			<label class="text-gray-dark font-weight-bold" for="">
				<i class="fas fa-lock mr-2"></i>Nova senha:
			</label>
			<input name="password" class="form-control" type="password"> 
		</div>
	</div>
	
	<div class="col">
		<div class="form-group">
			<label class="text-gray-dark font-weight-bold" for="">Confirme a nova senha:</label>
			<input name="password_confirmation" class="form-control" type="password">
		</div>
	</div>
</div>