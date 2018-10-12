<div id="contato" class="py-4">
	<div class="container">
		<h2 class="font-weight-bold text-center mb-3">Contato</h2>
		
		<div class="text-center text-primary">
			<i class="fas fa-envelope fa-4x"></i>
		</div>

		<p class="my-5 text-gray-dark text-center small">
			Deixa sua mensagem abaixo, iremos responder o mais breve possível!
		</p>
		
		<div class="col-md-6 mx-auto">
			<form action="#" method="POST">
				<div class="form-md-group {{ $errors->has('name') ? 'invalid-group' : '' }}">
					<input  name="name"
							id="name"
							value="{{ old('name') }}"
							class="form-control bg-light {{ old('name') ? 'active' : '' }}"
							type="text" 
							required/>

					<label for="name">
						<i class="fas fa-id-card fa-fw mr-1"></i> Nome completo
					</label>

					<span class="invalid-md-feedback" role="alert">
						{{ $errors->first('name') }}
					</span>
				</div>

				<div class="form-md-group {{ $errors->has('email') ? 'invalid-group' : '' }}">
					<input  name="email"
							id="message-email"
							value="{{ old('message-email') }}"
							class="form-control bg-light {{ old('email') ? 'active' : '' }}"
							type="email" 
							required/>

					<label for="email-message">
						<i class="fas fa-envelope fa-fw mr-1"></i> E-mail
					</label>

					<span class="invalid-md-feedback" role="alert">
						{{ $errors->first('message') }}
					</span>
				</div>

				<div class="form-md-group">
					<textarea class="form-control bg-light" name="message" id="message" rows="1" required></textarea>
					
					<label for="message">
						<i class="fas fa-pencil-alt fa-fw mr-1"></i> Sua mensagem...
					</label>

					<span class="invalid-md-feedback" role="alert">
						{{ $errors->first('message') }}
					</span>

				</div>
				
				<div class="text-center">
					<button class="btn btn-lg btn-success ">Enviar</button>
				</div>
			</form>
		</div>

	</div>
</div>

@push('scripts')
	<script>
		autosize(document.querySelector('textarea'));
	</script>
@endpush