<template>
    <toggle-button
        @change="toggle"
        :color="color"
        :width="width"
        :height="height"
        :value="active"
        :disabled="disabled"
        :sync="true" />
</template>

<script>
    export default {
        props: {
            active: {
                type: Boolean,
                required: true
            },
            endpoint: {
                type: String,
                required: true
            },
            width: {
                type: Number,
                default: 30
            },
            height: {
                type: Number,
                default: 18
            },
            color: {
                type: String,
                default: 'rgb(117, 199, 145)'
            },
            disabled: {
                type: Boolean,
                default: false
            }
        },

        methods: {
            toggle(state) {
                state.value ? axios.post(this.endpoint) : axios.delete(this.endpoint);
                this.$emit('changed', state.value);
            }
        }
    }
</script>

<style>
    label.vue-js-switch {
        margin-bottom: 3px;
    }
</style>
