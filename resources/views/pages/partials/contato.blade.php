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
            <form id="contactForm" action="{{ route('contact-message.store') }}" method="POST">
                @csrf

				@include('form.material-input', [
					'name' => 'full_name',
					'value' => old('full_name'),
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
					<textarea class="form-control bg-light" name="body" id="body" rows="1" required></textarea>

					<label for="body">
						<i class="fas fa-pencil-alt fa-fw mr-1"></i> Sua mensagem...
					</label>

					<span class="invalid-md-feedback" role="alert">
						{{ $errors->first('body') }}
					</span>
				</div>

				<div class="text-center">
					<button id="contactFormBtn" type="submit" class="btn btn-lg btn-success">Enviar</button>
				</div>
			</form>
		</div>

	</div>
</div>

@push('scripts')
	<script>
        autosize(document.querySelector('textarea'));

        (function () {
            var form = document.getElementById('contactForm');
            var fullNameField = form.querySelector('#full_name');
            var emailField = form.querySelector('#message-email');
            var bodyField = form.querySelector('#body');

            var btn = document.getElementById('contactFormBtn');

            form.addEventListener('submit', e => {
                e.preventDefault();

                var requestBody = {
                    full_name: fullNameField.value,
                    email: emailField.value,
                    body: bodyField.value
                };

                axios.post(@json(route('contact-message.store')), requestBody)
                    .then(() => {
                        btn.disabled = false;

                        var icon = btn.querySelector('i');

                        if (icon) {
                            icon.remove();
                        }

                        fullNameField.value = '';
                        emailField.value = '';
                        bodyField.value = '';

                        $('#contato').slideUp(500, function () {
                            $(this).remove();
                        });

                        document
                            .getElementById('navbar')
                            .querySelector('a[href="/#contato"]')
                            .parentElement
                            .remove();

                        flash('Mensagem enviada com sucesso.');
                    });
            });
        })();
	</script>
@endpush
