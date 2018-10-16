@csrf

<lesson-special-form inline-template>
    <div>
        <div v-for="day in weekDays" class="form-row">
            <div class="form-group col-md-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox"
                            class="custom-control-input"
                            name="week_days[]"
                            v-model="checkedDays"
                            :id="'day_' + day.number"
                            :value="day.number" />
                    <label class="custom-control-label" :for="'day_' + day.number" v-text="day.name"></label>
                </div>
            </div>

            <div class="form-group col-md-4 mr-md-5">
                <div class="form-row">
                    <label class="col-md-6" :for="'start_time_' + day.number">Hora de Início:</label>

                    <div class="col-md-6">
                        <input type="time"
                                :disabled="!day.checked"
                                :id="'start_time_' + day.number"
                                name="start_times[]"
                                class="form-control form-control-sm"
                                required />
                    </div>
                </div>
            </div>

            <div class="form-group col-md-4">
                <div class="form-row">
                    <label class="col-md-6" :for="'end_time_' + day.number">Hora de Término:</label>

                    <div class="col-md-6">
                        <input type="time"
                                :disabled="!day.checked"
                                :id="'end_time_' + day.number"
                                name="end_times[]"
                                class="form-control form-control-sm"
                                required />
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="form-row">
            <div class="col-md-6">
                <d-date-input
                    name="first_day"
                    label="Primeiro Dia"
                    placeholder="dd/mm/aaaa"
                    input-class="form-control-sm{{ $errors->first('first_day') ? ' is-invalid' : '' }}"
                    :disabled="!checkedDays.length"
                    :disabled-dates="disabledDates"
                    help-color="danger"
                    {!! $errors->first('first_day') ? 'help="' . $errors->first('first_day') . '"' : '' !!}
                    :required="true"></d-date-input>
            </div>

            <div class="col-md-6">
                <d-date-input
                    name="last_day"
                    label="Último Dia"
                    placeholder="dd/mm/aaaa"
                    input-class="form-control-sm{{ $errors->first('last_day') ? ' is-invalid' : '' }}"
                    :disabled="!checkedDays.length"
                    :disabled-dates="disabledDates"
                    help-color="danger"
                    {!! $errors->first('last_day') ? 'help="' . $errors->first('last_day') . '"' : '' !!}
                    :required="true"></d-date-input>
            </div>
        </div>

        <small v-show="!checkedDays.length" class="text-danger">
            Por favor, selecione os dias da semana que as aulas irão ocorrer, juntamente com os horários de início e fim de cada aula.
        </small>

        <div class="d-flex flex-row-reverse mt-1">
            <button :disabled="!checkedDays.length" type="submit" class="btn btn-lg btn-primary">
                Salvar
            </button>
        </div>
    </div>
</lesson-special-form>
