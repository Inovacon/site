<template>
    <button @click="toggle" class="btn-icon ml-2" :class="color" :disabled="disabled">
        <i :class="icon"></i>
    </button>
</template>

<script>
    export default {
        props: ['endpoint', 'active', 'size'],

        data() {
            return {
                activated: this.active,
                disabled: false,
                iconSize: this.size || 'lg'
            };
        },

        methods: {
            toggle() {
                this.disabled = true;

                this.activated ? this.deactivate() : this.activate();
            },

            activate() {
                axios.post(this.endpoint)
                    .then(response => {
                        this.changeState(true);
                     });
            },

            deactivate() {
                axios.delete(this.endpoint)
                    .then(response => {
                        this.changeState(false);
                    });
            },

            changeState(activated) {
                this.activated = activated;
                this.disabled = false;

                this.$emit('changed', activated);

                toastr.success(
                    activated ? 'Curso ativado com sucesso.' : 'Curso desativado com sucesso.'
                );
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
