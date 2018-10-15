<div class="row my-4">
	<div class="col">
	    <div class="form-group">
	    	<label class="text-gray-dark font-weight-bold">
	    		<i class="fas fa-id-card mr-2"></i>Nome completo:
	    	</label>

	    	<input disabled class="form-control" type="text" value="{{ $user->name }}">
	    </div>
	 </div>

	<div class="col">
	    <div class="form-group">
	    	<label class="text-gray-dark font-weight-bold" for="email">
	    		<i class="fas fa-envelope mr-2"></i>E-mail:
	    	</label>

	    	<input id="email" class="form-control" name="email" type="text" value="{{ $user->email }}" required>
	    </div>
	</div>
</div>

<div class="row my-4">
	<div class="col">
		<div class="form-group">
			<label class="text-gray-dark font-weight-bold" for="phone">
				<i class="fas fa-mobile-alt mr-2"></i>Celular:
			</label>

			<input id="phone" class="form-control phone" name="phone" type="text" value="{{ $user->phone }}" required>
		</div>
	</div>

	<div class="col">
		<div class="form-group">
			<label class="text-gray-dark font-weight-bold">
				<i class="fas fa-address-card mr-2"></i>CPF:
			</label>

			<input class="form-control cpf" type="text" disabled value="{{ $user->cpf_cnpj }}">
		</div>
	</div>
</div>

<div class="row my-4">
	<div class="col">
		<div class="form-group">
			<label class="text-gray-dark font-weight-bold" for="birth_date">
				<i class="fas fa-calendar-alt mr-2"></i>Data de nascimento:
			</label>

			<input disabled class="form-control birth-date" name="birth_date" type="text" value="{{ $user->birth_date }}">
		</div>
	</div>
</div>

<div class="row my-4">
	<div class="col">
		<label class="text-gray-dark font-weight-bold"> <i class="fas fa-venus-mars mr-2"></i>Gênero:</label>

		<div>
			<div class="custom-control custom-radio custom-control-inline">
				<input type="radio" id="customRadioMale" name="gender" value="M" {{ $user->gender == 'M' ? 'checked' : '' }} class="custom-control-input">
				<label class="text-gray-dark custom-control-label" for="customRadioMale">Masculino</label>
			</div>

			<div class="custom-control custom-radio custom-control-inline">
				<input type="radio" id="customRadioFemale" name="gender" value="F" {{ $user->gender == 'F' ? 'checked' : '' }} class="custom-control-input" >
				<label class="text-gray-dark custom-control-label" for="customRadioFemale">Feminino</label>
			</div>
		</div>
	</div>
</div>

<div class="row my-4">
	<div class="col">
		<div class="form-group">
			<label class="text-gray-dark font-weight-bold" for="old_password">
				<i class="fas fa-lock mr-2"></i>Senha antiga:
			</label>

			<input id="old_password"
                   name="old_password"
                   class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                   type="password" />

            @if ($errors->has('old_password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('old_password') }}</strong>
                </span>
            @else
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Deixe os campos de senha vazios caso não queira alterá-los
                </small>
            @endif
		</div>
	</div>
</div>

<div class="row my-4">
	<div class="col">
		<div class="form-group">
			<label class="text-gray-dark font-weight-bold" for="password">
				<i class="fas fa-lock mr-2"></i>Nova senha:
			</label>

            <input id="password"
                   name="password"
                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                   type="password" />

            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
		</div>
	</div>

	<div class="col">
		<div class="form-group">
			<label class="text-gray-dark font-weight-bold" for="password_confirmation">Confirme a nova senha:</label>

			<input id="password_confirmation" name="password_confirmation" class="form-control" type="password">
		</div>
	</div>
</div>
