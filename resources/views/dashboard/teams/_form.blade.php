@csrf

<d-input name="minimum_students"
         label="Mínimo de alunos"
         type="number"
         value="{{ old('minimum_students', $team->minimum_students) }}"></d-input>

<d-input name="maximum_students"
         label="Máximo de alunos"
         type="number"
         value="{{ old('maximum_students', $team->maximum_students) }}"></d-input>

<d-input name="times"
         label="Quantidade"
         type="number"
         :value="1"></d-input>

<d-button></d-button>
