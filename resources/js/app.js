
require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import VueRouter from 'vue-router';
import SettingProfileWorker from './components/SettingProfileWorker.vue';
import SettingProfileCustomer from './components/SettingProfileCustomer.vue';
import ProfileWorker from './components/ProfileWorker.vue';
import ProfileCustomer from './components/ProfileCustomer.vue';

import Exmaple from './components/Exmaple.vue';
import Swal from 'sweetalert2';
window.Swal=Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  }) 
  window.Toast=Toast;

Vue.component('add-post', require('./components/AddPost.vue').default);
Vue.component('complete-profile-worker', require('./components/CompleteProfileWorker.vue').default);
Vue.use(VueRouter);




const routes =[
    {path:'/home/',component:Exmaple},
    {path:'/home/Edit-Profile-Customer',component:SettingProfileCustomer},
    {path:'/home/Edit-Profile-Provider',component:SettingProfileWorker},
    {path:'/home/Profile-Worker',component:ProfileWorker},
    {path:'/home/Profile-Customer',component:ProfileCustomer},

];

const router=new VueRouter({routes,mode:'history'
});
const app = new Vue({
    el: '#app',
    router:router
});
