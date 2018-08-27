@csrf

<br>

<lesson-special-form inline-template>
    <div>
        <d-select name="week_days[]"
                  label="Dia(s) da Semana"
                  :multiple="true"
                  v-model="weekDays"
                  :help="selectedDays">
            <option value="1">Segunda-feira</option>
            <option value="2">Terça-feira</option>
            <option value="3">Quarta-feira</option>
            <option value="4">Quinta-feira</option>
            <option value="5">Sexta-feira</option>
            <option value="6">Sábado</option>
            <option value="0">Domingo</option>
        </d-select>

        <div class="row">
            <div class="col-md-6">
                <d-date-input name="first_day"
                              label="Primeiro Dia"
                              placeholder="dd/mm/aaaa"
                              :disabled-dates="disabledDates"></d-date-input>
            </div>

            <div class="col-md-6">
                <d-date-input name="last_day"
                              label="Último Dia"
                              placeholder="dd/mm/aaaa"
                              :disabled-dates="disabledDates"></d-date-input>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                @include('dashboard.form.input', [
                    'name' => 'start_time',
                    'type' => 'time',
                    'label' => 'Hora de Início',
                    'value' => old('start_time', $lesson->start_time)
                ])
            </div>

            <div class="col-md-6">
                @include('dashboard.form.input', [
                    'name' => 'end_time',
                    'type' => 'time',
                    'label' => 'Hora de Término',
                    'value' => old('end_time', $lesson->end_time)
                ])
            </div>
        </div>

        @component('dashboard.form.button')
            Salvar
        @endcomponent
    </div>
</lesson-special-form>
