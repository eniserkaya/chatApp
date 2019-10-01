<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" v-if="this.user">{{this.user.name}} Hoşgeldin.</div>

                    <div class="card-body">
                        <div class="under">
                            <input type="text" value="selectsss me!" />
                        </div>
                        <div id="container">
                            <div class="chat">
                                <div class="title">Mesajlaş</div>
                                <div class="text" style="position:relative; min-width:500px; min-height:500px; width:500px; height:500px;  overflow:scroll;">
                                    <p v-for="messageItem in messageList" >{{messageItem.userName}} : {{messageItem.message}}</p>

                                </div>
                                <div class="chatbox" >
                                    <input type="text" v-model="toSend" style="width: 250px" />
                                    <input type="button" value="Gönder" v-on:click="mesajGonder" style="width: 250px"/>
                                </div>
                            </div>
                        </div>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['app'],
        mounted() {

            console.log('Component mounted.')
            this.app.req.get('getMessageList').then(response =>{
                this.messageList = response.data;
                alert(response.data);
            }).catch(error => {
                this.errors.push(error.response.data.error);
            })
        },
        data() {
            return {
                messageList:[],
                toSend:"",
                user: this.app.user
            }
        },
        methods: {
            mesajGonder: function () {
                this.messageList.push(this.app.user.name + ": " + this.toSend);
            }
        }
    };
</script>

<style>

</style>
