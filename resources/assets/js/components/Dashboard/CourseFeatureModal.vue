<template>
    <div :id="id" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" v-text="title"></h5>

                    <div class="d-flex align-items-center">
                        <button type="button" class="close no-outline" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                </div>

                <div class="modal-body">
                    <div v-if="items.length">
                        <course-feature
                                v-for="(feature, index) in items"
                                :key="feature.index"
                                :feature="feature"
                                :type="featureType"
                                :course-id="courseId"
                                @updated="$emit('feature-updated')"
                                @update-failed="$emit('feature-update-failed')"
                                @deleted="onDelete(index)"></course-feature>
                    </div>
                    <div v-else>
                        <div class="alert alert-warning">
                            Não há nenhum item cadastrado.
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <new-course-feature
                            :type="featureType"
                            :course-id="courseId"
                            :placeholder="inputPlaceholder"
                            @created="onCreate"
                            @creation-failed="$emit('feature-creation-failed')"></new-course-feature>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CourseFeature from './CourseFeature';
    import NewCourseFeature from './NewCourseFeature';
    import collection from '../../mixins/collection';

    export default {
        props: ['id', 'title', 'featureType', 'courseId', 'inputPlaceholder'],

        components: { CourseFeature, NewCourseFeature },

        mixins: [collection],

        data() {
            return {
                newFeature: '',
                initialItemsCount: 0
            };
        },

        created() {
            axios.get(route(`dashboard.courses.${this.featureType}.index`, [this.courseId]))
                .then(response => {
                    this.items = response.data;
                    this.initialItemsCount = this.items.length;
                });
        },

        methods: {
            onDelete(index) {
                this.remove(index);

                this.$emit('feature-deleted');
            },

            onCreate(featureContent) {
                this.add({ index: this.initialItemsCount++, content: featureContent });

                this.$emit('feature-created');
            }
        }
    }
</script>
