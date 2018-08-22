<template>
    <div class="tab-pane"
         :class="classes"
         role="tabpanel"
         :id="id">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        props: {
            title: { required: true },
            fade: { default: false },
            show: { default: false },
            active: { default: false }
        },

        data() {
            return {
                id: ''
            };
        },

        computed: {
            classes() {
                return {
                    'fade': this.fade,
                    'active': this.active,
                    'show': this.show
                };
            }
        }
    }
</script>
