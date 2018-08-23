export default {
    props: {
        id: { default: undefined },
        name: { required: true },
        label: { required: true },
        placeholder: { default: '' },
        required: { default: true },
        help: { default : '' },
        helpColor: { default: 'muted' }
    },

    computed: {
        htmlId() {
            return this.id || this.name;
        },

        helpClasses() {
            return ['form-text', 'text-' + this.helpColor];
        }
    }
}
