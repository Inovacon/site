<template>
    <control-wrapper :html-id="htmlId" :label="label">
        <input :type="type"
               class="form-control"
               :id="htmlId"
               :name="name"
               :value="value"
               :placeholder="placeholder"
               :required="required"
               :step="type === 'number' ? 0.01 : ''">
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
            type: { default: 'text' }
        }
    }
</script>
