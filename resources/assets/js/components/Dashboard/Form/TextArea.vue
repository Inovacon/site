<template>
    <control-wrapper
            :html-id="htmlId"
            :label="label"
            :help="help"
            :help-classes="helpClasses">

        <textarea
                class="form-control"
                :name="name"
                :id="htmlId"
                :rows="rows"
                :placeholder="placeholder"
                :required="required">{{ value }}</textarea>
    </control-wrapper>
</template>

<script>
    import ControlWrapper from './ControlWrapper';
    import FormControl from '../../../mixins/form-control';

    export default {
        components: { ControlWrapper },

        mixins: [FormControl],

        props: {
            value: { default: '' },
            rows: { default: 3 }
        }
    }
</script>
