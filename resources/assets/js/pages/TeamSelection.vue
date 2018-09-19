<script>
    export default {
        props: {
            initialTeamId: { default: 0 }
        },

        data() {
            return {
                teamId: this.initialTeamId
            };
        }
    }
</script>
