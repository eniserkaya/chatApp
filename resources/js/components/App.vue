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
    import Home from "./Home";
    export default {
        name: "app",
        components: {Navbar,Home},
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
            window.Echo.channel('notification')
                .listen('ShowDialogEvent', (e) => {
                    console.log(e);
                });
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
