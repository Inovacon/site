<template>
    <div class="row border-bottom py-4">
        <label class="col-md-3 col-form-label font-weight-semi-bold text-gray-dark"
               :for="htmlId"
               v-text="label"></label>

        <div class="col-md-6">
            <select class="form-control"
                    :name="name"
                    :id="htmlId"
                    :required="required">

                <option v-if="!! placeholder"
                        value=""
                        v-text="placeholder"></option>

                <slot></slot>
            </select>
        </div>
    </div>
</template>

<script>
    import FormControl from '../../../mixins/form-control';

    export default {
        mixins: [FormControl]
    }
</script>
