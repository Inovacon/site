<script>
    import CourseFeatureModal from '../../components/Dashboard/CourseFeatureModal';

    export default {
        props: ['active'] ,

        components: { CourseFeatureModal },

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
