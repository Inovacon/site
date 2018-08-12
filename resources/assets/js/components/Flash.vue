<template></template>

<script>
    export default {
        props: ['type', 'message'],

        created() {
            if (this.message) {
                this.flash(this.message, this.type);
            }
        }
    }
</script>
