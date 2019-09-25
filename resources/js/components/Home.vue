<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" v-if="this.user">{{this.user.name}} Hoşgeldin.</div>

                    <div class="card-body">

                        Chat ekranı tasarlanacak
                        <br/>
                    </div>
                </div>            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['app'],
        mounted() {

            console.log('Component mounted.')
        },
        data () {
            return {
                user:this.app.user
            }
        }
    };
</script>

<style>

</style>
