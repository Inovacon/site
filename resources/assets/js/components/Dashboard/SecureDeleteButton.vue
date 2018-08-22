<template>
    <span>
        <a href="#" :class="classes" @click.prevent="destroy">
            <slot></slot>
        </a>

        <form ref="deleteForm" method="POST" :action="url">
            <input type="hidden" name="_token" :value="token">
            <input type="hidden" name="_method" value="DELETE">
        </form>
    </span>
</template>

<script>
    import swal from 'sweetalert';

    export default {
        props: ['classes', 'url', 'alert'],

        computed: {
            token() {
                return document.head.querySelector('meta[name="csrf-token"]').content;
            }
        },

        methods: {
            destroy() {
                swal({
                    buttons: ['Não', 'Sim'],
                    icon: 'warning',
                    dangerMode: true,
                    title: 'Você tem certeza?',
                    text: this.alert
                }).then(yes => {
                    if (! yes) {
                        return;
                    }

                    this.$refs.deleteForm.submit()
                });
            }
        }
    }
</script>
