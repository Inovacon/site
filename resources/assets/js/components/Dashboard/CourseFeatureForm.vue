<template>
    <div class="card">
        <div class="card-body p-3">
            <h6 class="mb-3 text-grayish">
                <i v-if="titleIcon" :class="'fas fa-fw mr-2 fa-'+titleIcon"></i>{{ title }}
            </h6>

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
                <div class="alert alert-warning mb-0 fs-13">
                    <i class="fas fa-exclamation-triangle fa-fw mr-1"></i>Não há nenhum item cadastrado.
                </div>
            </div>

            <new-course-feature
                class="mt-4"
                :type="featureType"
                :course-id="courseId"
                :placeholder="inputPlaceholder"
                @created="onCreate"
                @creation-failed="$emit('feature-creation-failed')"></new-course-feature>
        </div>
    </div>
</template>

<script>
    import CourseFeature from './CourseFeature';
    import NewCourseFeature from './NewCourseFeature';
    import collection from '../../mixins/collection';

    export default {
        props: [
            'id',
            'title',
            'courseId',
            'titleIcon',
            'featureType',
            'inputPlaceholder'
        ],

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
