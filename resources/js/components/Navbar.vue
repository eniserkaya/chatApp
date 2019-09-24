<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <router-link to="/" class="navbar-brand">Chat App</router-link>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{app.user ? app.user.name : 'Hesap'}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div v-if="!app.user">
                                <router-link to="/login" class="dropdown-item">Login</router-link>
                                <router-link to="/register" class="dropdown-item">Register</router-link>
                            </div>
                            <a v-else href="javascript:;" @click="logout" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        name: "navbar",
        props: ['app'],
        data() {
            return {

            }
        },
        methods: {
            logout(){
                this.app.req.post('auth/logout').then(() =>{
                    this.app.user = null;
                    this.router.push('/login');
                });

            }
        }

    }
</script>

<style scoped>

</style>
