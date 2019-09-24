<template>
    <div>
        <navbar :app="this" class="mb-2"/>
        <spinner v-if="loading"></spinner>
        <div v-else-if="initiated">
            <router-view :app="this"/>

        </div>
    </div>
</template>

<script>
    import Navbar from "./Navbar";

    export default {
        name: "app",
        components: {Navbar},
        data() {
            return {
                user: null,
                loading: false,
                initiated: false,
                req: axios.create({
                    baseUrl: BASE_URL
                })

            }
        },
        mounted(){
            this.init();
        },
        methods: {
            init() {
                this.loading = true;
                this.req.get('auth/init').then(response => {
                    this.user = response.data.user;
                    this.loading = false;
                    this.initiated = true;
                })
            }
        }

    }
</script>

<style scoped>

</style>
