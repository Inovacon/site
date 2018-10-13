<template>
    <div>
        <input id="trix" type="hidden" :name="name" :value="value">
        <trix-editor ref="trix" :class="{ 'is-invalid': error }" input="trix" :placeholder="placeholder"></trix-editor>

        <span v-if="error" class="invalid-feedback d-block">
            <span class="text-danger" v-text="error"></span>
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

<style>
    .trix-button {
        box-shadow: none !important;
        border: none !important;
        background-color: #fff !important;
    }
    
    .trix-button:hover {
        background-color: #dee2e6 !important;
        transition: .3s;
    }
    
    .trix-button-group {
        border-color: #ced4da !important;
        border-radius: 0 !important;
        border-bottom-width: 0 !important;
    }
    
    .trix-button-row {
        margin-bottom: -10px;
    }
    
    .trix-active {
        background-color: #ced4da !important;
    }

    trix-toolbar .trix-button-row {
        flex-wrap: wrap !important;
    }

    trix-editor {
        border-color: #ced4da !important;
        background-color: #fff;
        border-radius: 0;
        min-height: 200px;
    }

    trix-editor:focus {
        background-color: #ffffff !important;
        border-color: #00a0f0 !important;
    }

    trix-editor.is-invalid {
        border-color: #ef5350 !important;
    }

    @media (max-width: 768px) {
        trix-toolbar .trix-button-group--block-tools,
        trix-toolbar .trix-button-group--history-tools {
            margin-left: 0 !important;
        }
    }
</style>