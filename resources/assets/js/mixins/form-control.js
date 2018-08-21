export default {
    props: {
        id: { default: undefined },
        name: { required: true },
        label: { required: true },
        placeholder: { default: '' },
        required: { default: true }
    },

    computed: {
        htmlId() {
            return this.id || this.name;
        }
    }
}
