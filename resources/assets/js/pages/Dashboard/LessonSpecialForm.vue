<script>
    import moment from 'moment';

    export default {
        data() {
            return {
                weekDays: [],
                disabledDates: { customPredictor: date => false }
            };
        },

        mounted() {
            let disabledDates = {
                customPredictor: date => this.mustBeDisabled(date)
            };

            this.$nextTick(() => {
                this.disabledDates = disabledDates;
            });
        },

        created() {
            moment.locale('pt-br');
        },

        methods: {
            mustBeDisabled(date) {
                return this.weekDays.length && ! this.weekDays.includes(date.getDay().toString());
            }
        },

        computed: {
            selectedDays() {
                return this.weekDays
                    .map(day => moment().weekday(day).format('dddd'))
                    .join(', ');
            }
        }
    }
</script>
