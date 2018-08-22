<template>
    <control-wrapper :html-id="htmlId" :label="label">
        <select class="form-control"
                :name="name"
                :id="htmlId"
                :required="required">

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
        components: { ControlWrapper },

        mixins: [FormControl]
    }
</script>
