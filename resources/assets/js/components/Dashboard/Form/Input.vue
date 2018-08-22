<template>
    <div class="row border-bottom py-4">
        <label class="col-md-3 col-form-label font-weight-semi-bold text-gray-dark"
               :for="htmlId"
               v-text="label"></label>

        <div class="col-md-6">
            <input :type="type"
                   class="form-control"
                   :id="htmlId"
                   :name="name"
                   :value="value"
                   :placeholder="placeholder"
                   :required="required"
                   :step="type === 'number' ? 0.01 : ''">
        </div>
    </div>
</template>

<script>
    import FormControl from '../../../mixins/form-control';

    export default {
        mixins: [FormControl],

        props: {
            value: { default: '' },
            type: { default: 'text' }
        }
    }
</script>
