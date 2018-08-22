<template>
    <control-wrapper :html-id="htmlId" :label="label">
        <datepicker :bootstrap-styling="true"
                    :id="htmlId"
                    :value="value"
                    :placeholder="placeholder"
                    :required="required"
                    :language="ptBR"
                    :format="formatter"
                    :name="name"></datepicker>
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
            value: { default: '' }
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
