<template>
    <control-wrapper
            :html-id="htmlId"
            :label="label"
            :help="help"
            :help-classes="helpClasses">

        <div class="input-group">
            <div class="custom-file">
                <input type="file"
                       class="custom-file-input"
                       :id="htmlId"
                       :name="name"
                       :required="required"
                       lang="pt" />

                <label class="custom-file-label"
                       :for="htmlId"
                       v-text="placeholder"></label>
            </div>
        </div>
    </control-wrapper>

</template>

<script>
    import ControlWrapper from './ControlWrapper';
    import FormControl from '../../../mixins/form-control';

    export default {
        components: { ControlWrapper },

        mixins: [FormControl]
    }
</script>
