<script>
import axios from "axios";
export default {
    name: "films",
     data() {
        return {
            films: []
        }
     },
    mounted() {
        this.getFilms();
        console.log('I am here')
    },
    methods: {
        getFilms() {
            // axios.get()
        }
    }


}
</script>

<template>
    <div>View page</div>
</template>

<style scoped>

</style>
