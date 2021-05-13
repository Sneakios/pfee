
require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import VueRouter from 'vue-router';
import SettingProfileWorker from './components/SettingProfileWorker.vue';
import ProfileWorker from './components/ProfileWorker.vue';
import Exmaple from './components/Exmaple.vue';
import Swal from 'sweetalert2';
window.Swal=Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  }) 
  window.Toast=Toast;


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
