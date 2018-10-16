<template>
    <control-wrapper
            :html-id="htmlId"
            :label="label"
            :help="help"
            :help-classes="helpClasses">

        <datepicker :bootstrap-styling="true"
                    :id="htmlId"
                    :value="value"
                    :placeholder="placeholder"
                    :required="required"
                    :disabled="disabled"
                    :language="ptBR"
                    :format="formatter"
                    :disabled-dates="disabledDates"
                    :name="name"
                    :input-class="inputClass"></datepicker>
    </control-wrapper>
</template>

<script>
    import moment from 'moment';
    import { ptBR } from 'vuejs-datepicker/dist/locale';
    import Datepicker from 'vuejs-datepicker';
    import ControlWrapper from './ControlWrapper';
    import FormControl from '../../../mixins/form-control';

    export default {
        props: {
            value: { default: '' },
            inputClass: { default: '' },
            disabled: { default: false },
            disabledDates: { default: () => {} }
        },

        mixins: [FormControl],

        components: { Datepicker, ControlWrapper },

        data() {
            return {
                ptBR: ptBR
            };
        },

        methods: {
            formatter(date) {
                return moment(date).format('DD/MM/YYYY');
            }
        }
    }
</script>
