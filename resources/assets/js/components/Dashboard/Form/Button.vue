<template>
    <div class="row mt-4 text-right">
        <div class="col-md-9">
            <button :type="type"
                    class="btn btn-lg btn-primary ml-2"
                    v-text="content"></button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            type: { default: 'submit' },
            content: { default: 'Salvar' }
        }
    }
</script>
