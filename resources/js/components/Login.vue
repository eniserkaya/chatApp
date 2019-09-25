<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Giriş Yap
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-6 offset-md-3">
                <form v-on:submit.prevent="onSubmit">
                    <div class="alert alert-danger" v-if="errors.length">
                        <ul class="mb-0">
                            <li v-for="(error,index) in errors" :key="index">
                                {{error}}
                            </li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label>Kullanıcı adı</label>
                        <input type="text" class="form-control" placeholder="name" v-model="username">
                    </div>
                    <div class="form-group">
                        <label>Parola</label>
                        <input type="password" class="form-control" placeholder="name" v-model="password">
                    </div>
                    <button class="btn btn-success">Giriş</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login",
        props: ['app'],
        data () {
            return {
                name:'',
                username:'',
                password:'',
                passwordAgain:'',
                errors:[],
            }
        },
        methods:{
            onSubmit(){
                this.errors = [];

                if(!this.username){
                    this.errors.push('Kullanıcı adı gereklidir.');
                }
                if(!this.password){
                    this.errors.push('Parola gereklidir.');
                }

                if(!this.errors.length){
                    const data = {
                        username:this.username,
                        password:this.password
                    };

                    this.app.req.post('auth/login',data).then(response =>{
                        this.app.user = response.data.user;
                        this.$router.push('/');
                    }).catch(error => {
                        this.errors.push(error.response.data.error);
                    })

                }

            }
        }
    }
</script>

<style scoped>

</style>
