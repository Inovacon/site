<div class="card">

	<div 	class="card-header bg-primary d-flex justify-content-between cursor-pointer"
			id="headingThree"
			role="button"
			data-toggle="collapse"
			data-target="#collapseThree"
			aria-expanded="true"
			aria-controls="collapseThree">
		<h6 class="text-white font-weight-600 align-self-center mb-0">
			<i class="fas fa-list-ul mr-2 fa-fw"></i></i>Conteúdo programático
		</h6>

		<i class="fas fa-angle-down fa-fw align-self-center fa-lg text-white"></i>
	</div>
	
	<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionCourses">
		<div class="card-body">
			<ul class="list-group list-group-flush">
				@forelse($course->content as $content)
					<li class="list-group-item">{{ $content }}</li>
				@empty
					<p class="text-gray-dark text-center mb-0">Nenhum conteúdo programático foi cadastrado para este curso.</p>
				@endforelse
			</ul>
		</div>
	</div>
</div>