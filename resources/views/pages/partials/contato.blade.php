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
				@include('form.material-input', [
					'name' => 'name',
					'value' => old('name'),
					'label' => 'Nome completo',
					'class' => 'bg-light',
					'icon' => 'fas fa-id-card',
					'required' => true
				])
				
				@include('form.material-input', [
					'id' => 'message-email',
					'name' => 'email',
					'value' => old('email'),
					'label' => 'E-mail',
					'class' => 'bg-light',
					'icon' => 'fas fa-envelope ',
					'type' => 'email',
					'required' => true
				])

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