@csrf

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

        <d-date-input name="first_day"
                      label="Primeiro Dia"
                      placeholder="dd/mm/aaaa"
                      :disabled-dates="disabledDates"></d-date-input>

        <d-date-input name="last_day"
                      label="Último Dia"
                      placeholder="dd/mm/aaaa"
                      :disabled-dates="disabledDates"></d-date-input>

        <d-input name="start_time"
                 label="Hora de Início"
                 type="time"></d-input>

        <d-input name="end_time"
                 label="Hora de Término"
                 type="time"></d-input>

        <d-button></d-button>
    </div>
</lesson-special-form>
