<template>
    <div class="card card-body my-2 px-2 py-1">
        <div class="d-flex justify-content-between align-content-center">
            <div v-if="editing" class="flex-95">
                <input type="text" class="form-control form-control-sm" v-model="content" required autofocus>
            </div>
            <div v-else>
                <span>{{ originalContent }}</span>
            </div>

            <div class="d-flex align-items-center">
                <div v-if="editing">
                    <button @click="update" class="btn-icon text-gray-dark">
                        <i class="fas fa-check-circle"></i>
                    </button>

                    <button @click="cancelUpdate" class="btn-icon text-danger ml-1">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </div>
                <div v-else>
                    <button @click="editing = true" class="btn-icon text-gray-dark">
                        <i class="fas fa-edit"></i>
                    </button>

                    <button @click="destroy" class="btn-icon text-danger ml-1">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['feature', 'type', 'courseId'],

        data() {
            return {
                editing: false,
                content: this.feature.content,
                originalContent: this.feature.content
            };
        },

        methods: {
            update() {
                if ('' === this.content.trim()) {
                    this.$emit('update-failed');

                    return;
                }

                axios.patch(
                    route(`dashboard.courses.${this.type}.update`, [this.courseId, this.feature.index]),
                    { name: this.content }
                );

                this.editing = false;
                this.originalContent = this.content;

                this.$emit('updated');
            },

            destroy() {
                axios.delete(route(`dashboard.courses.${this.type}.destroy`, [this.courseId, this.feature.index]));

                this.$emit('deleted');
            },

            cancelUpdate() {
                this.editing = false;
                this.content = this.originalContent;
            }
        }
    }
</script>
