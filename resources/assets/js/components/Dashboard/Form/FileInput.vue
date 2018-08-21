<template>
    <div class="row border-bottom py-4">
        <label class="col-md-3 col-form-label font-weight-semi-bold text-gray-dark"
               :for="htmlId"
               v-text="label"></label>

        <div class="col-md-6">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file"
                           class="custom-file-input"
                           :id="htmlId"
                           :name="name"
                           :required="required"
                           lang="pt">

                    <label class="custom-file-label"
                           :for="htmlId"
                           v-text="placeholder"></label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FormControl from '../../../mixins/form-control';

    export default {
        mixins: [FormControl]
    }
</script>
