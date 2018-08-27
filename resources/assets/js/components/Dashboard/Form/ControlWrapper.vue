<template>
    <div class="form-group row mx-0">
        <label class="col-md-3 pl-0 col-form-label text-gray-dark"
               :for="htmlId"
               v-text="label"></label>

        <div class="col-md-6">
            <slot></slot>

            <small v-if="help" :class="helpClasses" v-text="help"></small>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            htmlId: { required: true },
            label: { required: true },
            help: { default: '' },
            helpClasses: { default: () => [] }
        }
    }
</script>
