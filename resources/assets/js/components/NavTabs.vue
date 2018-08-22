<template>
    <div>
        <nav>
            <div class="nav" :class="classes" id="nav-tab" role="tablist">
                <a v-for="pane in panes"
                   class="nav-item nav-link rounded-0"
                   :class="{ 'active': pane.$props.active }"
                   data-toggle="tab"
                   :href="'#'+pane.$data.id"
                   role="tab"
                   v-text="pane.$props.title"></a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            pills: { default: true },
            fill: { default: true }
        },

        data() {
            return {
                panes: []
            };
        },

        mounted() {
            this.$nextTick(() => {
                this.setPanes();
            });
        },

        methods: {
            setPanes() {
                this.panes = this.$children.map((component, index) => {
                    component.$data.id = 'nav-' + index;

                    return component;
                });
            }
        },

        computed: {
            classes() {
                return [
                    this.pills ? 'nav-pills' : 'nav-tabs',
                    this.fill ? 'nav-fill' : ''
                ];
            }
        }
    }
</script>
