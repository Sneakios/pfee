
require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import VueRouter from 'vue-router';
import SettingProfile from './components/SettingProfile.vue';
import ProfileWorker from './components/ProfileWorker.vue';
import Exmaple from './components/Exmaple.vue';

Vue.use(VueRouter);




const routes =[
    {path:'/',component:Exmaple},

    {path:'/Edit-Profile',component:SettingProfile},
    {path:'/Profile-Worker',component:ProfileWorker},

];

const router=new VueRouter({routes});
const app = new Vue({
    el: '#app',
    router:router
});
