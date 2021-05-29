
require('./bootstrap');

window.Vue = require('vue').default;
Vue.component('pagination', require('laravel-vue-pagination'));

import Vue from 'vue';
import VueRouter from 'vue-router';
import SettingProfileWorker from './components/SettingProfileWorker.vue';
import SettingProfileCustomer from './components/SettingProfileCustomer.vue';
import ProfileWorker from './components/ProfileWorker.vue';
import ProfileCustomer from './components/ProfileCustomer.vue';
import PostDetails from './components/PostDetails.vue';
import Posts from './components/Posts.vue';
import MyPosts from './components/MyPosts.vue';
import UserDetails from './components/UserDetails.vue';
import PostInteressent from './components/PostInteressent.vue';
import PortFolio from './components/PortFolio.vue';
import Swal from 'sweetalert2';
window.Swal=Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3300,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  }) 
 const Alert = Swal.mixin({  
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',   
  })

  window.Toast=Toast;
  window.Alert=Alert;

Vue.component('add-post', require('./components/AddPost.vue').default);
Vue.component('complete-profile-worker', require('./components/CompleteProfileWorker.vue').default);
Vue.component('search-user', require('./components/Search.vue').default);

Vue.use(VueRouter);

const routes =[
    {path:'/home/',component:Posts},
    {path:'/home/Edit-Profile-Customer',component:SettingProfileCustomer},
    {path:'/home/Edit-Profile-Provider',component:SettingProfileWorker},
    {path:'/home/Profile-Worker',component:ProfileWorker},
    {path:'/home/Profile-Customer',component:ProfileCustomer},
    {path:'/home/PostDetails/:id',component:PostDetails},
    {path:'/home/MyPosts/',component:MyPosts},
    {path:'/home/PostsInteressent/',component:PostInteressent},
    {path:'/home/UserDetails/:id',component:UserDetails},
    {path:'/home/Port-Folio/',component:PortFolio}

];

const router=new VueRouter({routes,mode:'history'});
const app = new Vue({
    el: '#app',
    router:router
});
