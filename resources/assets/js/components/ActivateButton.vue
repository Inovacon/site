<template>
    <button @click="toggle" class="btn-icon ml-2" :class="color">
        <i :class="icon"></i>
    </button>
</template>

<script>
    export default {
        props: ['endpoint', 'active', 'size'],

        data() {
            return {
                activated: this.active,
                iconSize: this.size || 'lg'
            };
        },

        methods: {
            toggle() {
                this.activated ? this.deactivate() : this.activate();
            },

            activate() {
                axios.post(this.endpoint);

                this.changeState(true);
            },

            deactivate() {
                axios.delete(this.endpoint);

                this.changeState(false);
            },

            changeState(activated) {
                this.activated = activated;

                this.$emit('changed', activated);
            }
        },

        computed: {
            icon() {
                return [
                    'fas',
                    `fa-${this.iconSize}`,
                    this.activated ? 'fa-toggle-on' : 'fa-toggle-off'
                ];
            },

            color() {
                return this.activated ? 'text-success' : 'text-danger';
            }
        }
    }
</script>
