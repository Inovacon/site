<script>
    import moment from 'moment';

    export default {
        data() {
            return {
                checkedDays: [],
                weekDays: [],
                disabledDates: {
                    customPredictor: date => false
                }
            };
        },

        mounted() {
            const disabledDates = {
                customPredictor: this.datepickerMustBeDisabled.bind(this)
            };

            this.$nextTick(() => {
                this.disabledDates = disabledDates;
            });
        },

        created() {
            moment.locale('pt-br');

            const weekDays = [
                'Segunda-feira',
                'Terça-feira',
                'Quarta-feira',
                'Quinta-feira',
                'Sexta-feira',
                'Sábado'
            ];

            weekDays.forEach((name, i) => {
                this.weekDays.push({
                    name,
                    checked: false,
                    number: (i + 1).toString()
                });
            });
        },

        watch: {
            checkedDays(newCheckedDays) {
                this.weekDays.forEach(day => {
                    day.checked = newCheckedDays.includes(day.number) ? true : false;
                });
            }
        },

        methods: {
            datepickerMustBeDisabled(date) {
                return !this.checkedDays.includes(date.getDay().toString());
            }
        }
    }
</script>

<style>
    .vdp-datepicker__calendar {
        position: static;
    }
</style>
