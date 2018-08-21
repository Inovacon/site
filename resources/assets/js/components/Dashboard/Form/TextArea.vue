<template>
    <div class="row border-bottom py-4">
        <label class="col-md-3 col-form-label font-weight-semi-bold text-gray-dark"
               :for="htmlId"
               v-text="label"></label>

        <div class="col-md-6">
            <textarea
                    class="form-control"
                    :name="name"
                    :id="htmlId"
                    :rows="rows"
                    :placeholder="placeholder"
                    :required="required">{{ value }}</textarea>
        </div>
    </div>
</template>

<script>
    import FormControl from '../../../mixins/form-control';

    export default {
        mixins: [FormControl],

        props: {
            value: { default: '' },
            rows: { default: 3 }
        }
    }
</script>
