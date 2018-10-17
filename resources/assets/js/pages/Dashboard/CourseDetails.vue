<script>
    import CourseFeatureForm from '../../components/Dashboard/CourseFeatureForm';

    export default {
        props: ['active'] ,

        components: { CourseFeatureForm },

        data() {
            return {
                activated: this.active,
            };
        },

        methods: {
            onChange(activated) {
                this.activated = activated;

                this.flash(
                    activated ? 'Curso ativado com sucesso.' : 'Curso desativado com sucesso.'
                );
            }
        }
    }
</script>
