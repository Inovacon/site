<template>
    <div class="row border-bottom py-4 mx-0">
        <label class="col-md-3 pl-0 col-form-label font-weight-semi-bold text-gray-dark"
               :for="htmlId"
               v-text="label"></label>

        <div class="col-md-6">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            htmlId: { required: true },
            label: { required: true }
        }
    }
</script>
