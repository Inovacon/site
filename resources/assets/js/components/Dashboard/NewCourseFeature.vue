<template>
    <div class="input-group input-group-sm">
        <input type="text"
               class="form-control focus-no-shadow no-outline"
               :placeholder="placeholder"
               v-model="value"
               @keydown.enter="store">

        <div class="input-group-append">
            <button @click="store" class="btn btn-outline-primary">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['placeholder', 'type', 'courseId'],

        data() {
            return {
                value: ''
            };
        },

        methods: {
            store() {
                if ('' === this.value.trim()) {
                    this.$emit('creation-failed');

                    return;
                }

                axios.post(
                    route(`dashboard.courses.${this.type}.store`, [this.courseId]),
                    { name: this.value }
                );

                this.$emit('created', this.value);

                this.value = '';
            }
        }
    }
</script>
