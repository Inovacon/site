<template>
    <div>
        <span v-if="show" class="long-text-span">
            <span v-text="content"></span>

            <a v-if="isLong"
               @click.prevent="show = false"
               href="#"
               class="long-text-hide-link"><br>Ocultar</a>
        </span>

        <a v-else
           @click.prevent="show = true"
           href="#"
           class="long-text-show-link">Exibir</a>
    </div>
</template>

<script>
    export default {
        props: {
            content: String
        },

        data() {
            return {
                show: false,
                isLong: true
            };
        },

        created() {
            if (35 >= this.content.length) {
                this.show = true;
                this.isLong = false;
            }
        }
    }
</script>

<style>
    .long-text-span {
        font-size: 14px;
        display: block;
        line-height: 1;
    }

    .long-text-hide-link,
    .long-text-show-link {
        text-decoration: none !important;
    }

    .long-text-hide-link {
        font-size: 10px;
    }
</style>
