require('./bootstrap');
window.Vue = require('vue');




import Vue from 'vue';
import Router from 'vue-router';
import VueRouter from "vue-router";

import routes from './routes';
Vue.use(Router);
Vue.component('spinner',require('vue-simple-spinner'));


const router = new VueRouter({
    routes
});
import App from './components/App';
new Vue({
    router,
    render: h => h(App)
}).$mount('#app');
