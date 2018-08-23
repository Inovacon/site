<template>
    <control-wrapper
            :html-id="htmlId"
            :label="label"
            :help="help"
            :help-classes="helpClasses">

        <select class="form-control"
                :name="name"
                :id="htmlId"
                :required="required"
                :multiple="multiple"
                v-model="selected"
                @change="$emit('input', selected)">

            <option v-if="!! placeholder"
                    value=""
                    v-text="placeholder"></option>

            <slot></slot>
        </select>
    </control-wrapper>
</template>

<script>
    import ControlWrapper from './ControlWrapper';
    import FormControl from '../../../mixins/form-control';

    export default {
        props: {
            value: { default: () => [] },
            multiple: { default: false }
        },

        data() {
            return {
                selected: this.value
            };
        },

        components: { ControlWrapper },

        mixins: [FormControl]
    }
</script>
