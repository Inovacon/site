export default {
    data() {
        return {
            items: [],
        };
    },

    methods: {
        add(item) {
            this.items.push(item);

            this.$emit('added', item);
        },

        remove(index) {
            if (undefined === index) {
                index = this.items.length - 1;
            }

            this.items.splice(index, 1);

            this.$emit('removed');
        }
    }
}
