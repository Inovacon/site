@csrf

<d-input name="date"
         label="Data"
         type="date"
         value="{{ old('date', $lesson->date->format('Y-m-d')) }}"></d-input>

<d-input name="start_time"
         label="Hora de Início"
         type="time"
         value="{{ old('start_time', $lesson->start_time) }}"></d-input>

<d-input name="end_time"
         label="Hora de Término"
         type="time"
         value="{{ old('end_time', $lesson->end_time) }}"></d-input>

<d-button></d-button>
