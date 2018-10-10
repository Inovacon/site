<div class="card">
	<div 	class="card-header bg-primary d-flex justify-content-between cursor-pointer"
		id="headingOne"
		role="button"
		data-toggle="collapse"
		data-target="#collapseOne"
		aria-expanded="true"
		aria-controls="collapseOne">
		<h6 class="text-white font-weight-600 align-self-center mb-0">
			<i class="fas fa-info-circle mr-2 fa-fw"></i>Informações sobre o curso 
		</h6>

		<i class="fas fa-angle-down fa-fw align-self-center fa-lg text-white"></i>
	</div>

	<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionCourses">
		<div class="card-body">
			<div class="row no-gutters">
				<div class="col-lg-5">
					<img class="img-fluid img-thumbnail mb-2" src="{{ $course->publicImagePath }}" alt="">
					
					<table class="table table-small table-borderless">
						<tr>
							<td>
								<span class="font-weight-600">
									<i class="fas fa-graduation-cap fa-fw text-primary mr-1"></i>Área relacionada:
								</span>
							</td>
							<td>
								<span>{{ $course->occupationArea->name }}</span>
							</td>
						</tr>
						<tr>
							<td>
								<span class="font-weight-600">
									<i class="fas fa-graduation-cap fa-fw text-primary mr-1"></i>Tipo de curso:
								</span>
							</td>
							<td>
								<span>{{ $course->type->name }}</span>
							</td>
						</tr>
						<tr>
							<td>
								<span class="font-weight-600">
									<i class="fas fa-user-clock fa-fw text-primary mr-1"></i>Carga Horária:
								</span>
							</td>
							
							<td>
								<span>{{ $course->hours }}h</span>
							</td>
						</tr>
						<tr>
							<td>
								<span class="font-weight-600">
									<i class="fas fa-chalkboard-teacher fa-fw text-primary mr-1"></i>Modalidade:
								</span>
							</td>
							<td>
								<span>{{ $course->modality->name }}</span>
							</td>
						</tr>
						<tr>
							<td>
								<span class="font-weight-600">
									<i class="fas fa-users fa-fw text-primary mr-1"></i>Público alvo:
								</span>
							</td>
							<td>
								<span>{{ $course->targetAudience->name }}</span>
							</td>
						</tr>
					</table>
				</div>

				<div class="col-lg-6 mx-auto small text-gray-dark ml-3">
					{{ $course->description }}
				</div>
			</div>
		</div>
	</div>
</div>