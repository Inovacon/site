<div class="card">
	<div 	class="card-header bg-primary d-flex justify-content-between cursor-pointer"
		id="headingTwo"
		role="button"
		data-toggle="collapse"
		data-target="#collapseTwo"
		aria-expanded="true"
		aria-controls="collapseTwo">
		<h6 class="text-white font-weight-600 align-self-center mb-0">
			<i class="fas fa-calendar-alt mr-2 fa-fw"></i></i>Grade horária 
		</h6>

		<i class="fas fa-angle-down fa-fw align-self-center fa-lg text-white"></i>
	</div>
	
	<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionCourses">
		<div class="card-body">
			<table class="table table-small table-bordered">
				<thead>
					<tr>
						<td class="text-center font-weight-bold" colspan="3">Semana do dia 02 até 09</td>
					</tr>

					<tr class="font-weight-bold">
						<td>Dia da semana</td>

						<td>Início</td>

						<td>Término</td>
					</tr>
				</thead>

				<tbody>
					@foreach($lessons as $lesson)
						<tr>
							<td class="first-letter-upper">{{ utf8_encode(strftime("%A", strtotime($lesson->date))) }}</td>
							<td>{{ strftime("%Hh e %Mmin", strtotime($lesson->start_time)) }}</td>
							<td>{{ strftime("%Hh e %Mmin", strtotime($lesson->end_time)) }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>