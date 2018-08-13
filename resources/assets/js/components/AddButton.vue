<template>
    <a :href="href" class="btn btn-lg btn-primary">
        <span class="d-none d-md-inline" v-text="content"></span>
        <i class="fas fa-plus fa-lg d-md-none"></i>
    </a>
</template>

<script>
    export default {
        props: ['href', 'content']
    }
</script>
