
require('./bootstrap');

window.Vue = require('vue').default;
Vue.component('pagination', require('laravel-vue-pagination'));

import Vue from 'vue';
import VueRouter from 'vue-router';
import SettingProfileWorker from './components/SettingProfileWorker.vue';
import SettingProfileCustomer from './components/SettingProfileCustomer.vue';
import Contacts from './components/Contact.vue';
import SearchWorker from './components/SearchWorker.vue';
import PostDetails from './components/PostDetails.vue';
import Posts from './components/Posts.vue';
import MyPosts from './components/MyPosts.vue';
import UserDetails from './components/UserDetails.vue';
import PostInteressent from './components/PostInteressent.vue';
import PortFolio from './components/PortFolio.vue';
import GetPortFolios from './components/GetPortFolios.vue';

import PortfolioDetails from './components/PortfolioDetails';
import GestionUsers from './components/adminComponents/GestionUsers';
import DashboardAdmin from './components/adminComponents/Dashboard';
import Settings from './components/adminComponents/Settings';
import ProfileAdmin from './components/adminComponents/ProfileAdmin';
import ContactUsDetails from './components/adminComponents/ContactUsDetails';
import Swal from 'sweetalert2';
import Raters from 'vue-rate-it';
import 'vuejs-datatable/dist/themes/bootstrap-4.esm';
import { VuejsDatatableFactory } from 'vuejs-datatable';

Vue.use( VuejsDatatableFactory );
Vue.component('star-rating',Raters);


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
    {path:'/home/Profile-Worker',component:Contacts},
    {path:'/home/SearchWorker',component:SearchWorker},
    {path:'/home/PostDetails/:id',component:PostDetails},
    {path:'/home/MyPosts/',component:MyPosts},
    {path:'/home/PostsInteressent/',component:PostInteressent},
    {path:'/home/UserDetails/:id',component:UserDetails},
    {path:'/home/Port-Folio/',component:PortFolio},
    {path:'/home/Port-Folios/:id',component:GetPortFolios},

    {path:'/home/PortfolioDetails/:id',component:PortfolioDetails},

    {path:'/DashboardAdmin/gestion-users/',component:GestionUsers},
    {path:'/DashboardAdmin/',component:DashboardAdmin},
    {path:'/DashboardAdmin/Settings',component:Settings},
    {path:'/DashboardAdmin/profilesettings',component:ProfileAdmin},
    {path:'/DashboardAdmin/contactUsDetails',component:ContactUsDetails},
    

];

const router=new VueRouter({routes,mode:'history'});
const app = new Vue({
    el: '#app',
    router:router
});
