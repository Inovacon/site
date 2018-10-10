<template>
    <div>
        <input id="trix" type="hidden" :name="name" :value="value">
        <trix-editor ref="trix" :class="{ 'is-invalid': error }" input="trix" :placeholder="placeholder"></trix-editor>

        <span v-if="error" class="invalid-feedback d-block">
            <strong class="text-danger" v-text="error"></strong>
        </span>
    </div>
</template>

<script>
    import Trix from 'trix';
    export default {
        props: ['name', 'value', 'error', 'placeholder', 'clear'],
        watch: {
            clear() {
                this.$refs.trix.value = '';
            }
        },
        mounted() {
            this.$refs.trix.addEventListener('trix-change', e => {
                this.$emit('input', e.target.innerHTML);
                this.$emit('keydown', e.target.innerHTML);
            });
        }
    }
</script>