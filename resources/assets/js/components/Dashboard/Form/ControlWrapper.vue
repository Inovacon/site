<template>
    <div class="form-group">
        <label class="font-weight-bold"
               :for="htmlId"
               v-text="label"></label>

        <div>
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
