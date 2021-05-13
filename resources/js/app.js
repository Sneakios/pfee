
require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import VueRouter from 'vue-router';
import SettingProfileWorker from './components/SettingProfileWorker.vue';
import ProfileWorker from './components/ProfileWorker.vue';
import Exmaple from './components/Exmaple.vue';


Vue.component('complete-profile-worker', require('./components/CompleteProfileWorker.vue').default);
Vue.use(VueRouter);




const routes =[
    {path:'/home/',component:Exmaple},

    {path:'/Edit-Profile-Worker',component:SettingProfileWorker},
    {path:'/Profile-Worker',component:ProfileWorker},

];

const router=new VueRouter({routes,mode:'history'
});
const app = new Vue({
    el: '#app',
    router:router
});
