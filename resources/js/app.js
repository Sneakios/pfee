
require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import VueRouter from 'vue-router';
import SettingProfile from './components/SettingProfile.vue';
import ProfileEmployeur from './components/ProfileEmployeur.vue';
import Exmaple from './components/Exmaple.vue';

Vue.use(VueRouter);




const routes =[
    {path:'/',component:Exmaple},

    {path:'/Edit-Profile',component:SettingProfile},
    {path:'/Profile-Employeur',component:ProfileEmployeur},

];

const router=new VueRouter({
    mode:'history',
    routes
});
const app = new Vue({
    el: '#app',
    router:router
});
