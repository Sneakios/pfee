<template>
    <div class="container">
     
    <div class="main-body">
         <symbol  id="icon-star" viewBox="0 0 27 27" >
					<title>star</title>
					<path  class="path1" d="M16 23.808l-10.038 6.692 4.462-11.154-10.038-6.692h11.154l4.462-11.154 4.462 11.154h11.154l-10.038 6.692 4.462 11.154z"></path>
				</symbol>
    
          <div class="row gutters-sm">
            <div class="col-md-5 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img :src="
                        'http://127.0.0.1:8000/assets/avatars/'+user.avatar" alt="Admin" class="rounded-circle" width="200" height="200">
                    <div class="mt-3">
                      <h4>{{user.name}}</h4>
                     <span  v-if="user.rate >= 0">
                        <div>
                            <star-rating v-if="!user.rated" v-model="user.rate" :rating="user.rate" :itemSize="50" :showRating="false"  @rating-selected="setRate" ></star-rating>
                            
                            <div v-if="user.rated"><button class="btn btn-success" style="border-radius: 5px;font-size:15px;color:white;font-size:13px;font-weight:600;width:135px;" @click.prevent="resetRate"><i class="fa fa-star" aria-hidden="true"  style="font-size:15px;weight:600"></i> Reset Rating ?</button></div> 
                          </div>
                    </span>
                    <br>
                     <p class="text-muted font-size-sm">{{user.description}}</p>
                     <span  v-if="user.followers>=0">
                      <button class="btn btn-primary" @click.prevent="Follow" v-if="!user.followed"><i class="fa fa-plus"  style="font-size:15px;weight:600"></i> Follow</button>
                      <button class="btn btn-success" v-if="user.followed" @click.prevent="Unfollow"><i class="fa fa-check" style="font-size:15px;weight:600"></i> Unfollow</button>
                     </span>
                      <button class="btn btn-outline-primary">Message</button>
                    </div>
                  </div>
                </div>
              </div>
           
            </div>
            <div class="col-md-7 mb-3">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{user.name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <i class="fa fa-envelope" aria-hidden="true" ></i>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{user.email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      +216 {{user.mobile}}
                    </div>
                  </div>
                  <hr>
                  <div class="row" v-if="user.skills != ''">
                    <div class="col-sm-3">
                      <i class="fa fa-tasks" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{user.skills}}
                    </div>
                  </div>
                  <hr  v-if="user.followers>=0">
                  <div class="row">
                    <div class="col-sm-3">
                     <i class="fa fa-address-card" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{user.address}}
                    </div>
                  </div>                  
                  <hr  v-if="user.followers>=0">
                    <div class="row" v-if="user.followers>=0">
                    <div class="col-sm-3">
                      <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-9 text-secondary" >
                      {{user.followers}} Followers
                    </div>
                  </div> 
                  <hr v-if="user.nbrRates>=0">
                   <div class="row" v-if="user.nbrRates>=0">
                    <div class="col-sm-3">
                      <i class="fa fa-percent" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{user.rate}} average based on {{user.nbrRates}} reviews.
                    </div>
                  </div> 
                  <hr  v-if="user.followers>=0">
                  <div class="row">
                    <div class="col-sm-12"  v-if="user.followers>=0">
                      <a class="btn btn-success" target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Some Projects</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
   
</template>

<script>
import {StarRating} from 'vue-rate-it';

    export default {
       components:{
    StarRating
  },
        data(){
          return{
  
            user:{
              name:"",
              email:"",
              mobile:"",
              skills:"",
              address:"",
              followers:"",
              rate:0,
              description:"",
              avatar:"",
              rated:'',
              followed:'',
              nbrRates:'',
              

            }

          }
        },

        methods: {
          getUserDetails(){
            axios.get("/userDetails/"+this.$route.params.id).then(response=>{
              this.user=response.data.data;
            })},
           
           setRate(){
          Alert.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning', 
            confirmButtonText: 'Yes, rate it!'    
                 
          }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/setRate/'+this.$route.params.id,{rate:this.user.rate}).then(response=>{
                  if(response.data.status=="success"){
         Swal.fire(
                'Rate it!',
                'Your rate has been sent.',
                'success'
              )             
                 this.user.rated=true;
                  this.user.nbrRates++;
                  }
                })
          
            }else{Swal.fire(
                'Cancelled!',
                'Your rate has been not sent :)',
                'error'
              )       }
          })          
    },

    
        Unfollow(){
          Alert.fire({
            title: 'Are you sure?',
            text: "",
            icon: 'warning', 
            confirmButtonText: 'Yes, unfollow it!'    
                 
          }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/unfollow/'+this.$route.params.id).then(response=>{
                  if(response.data.status=="success"){
         Swal.fire(
                'UnFollow it!',
                '',               
                'success'
              )             
                 this.user.followed=false;
                 this.user.followers--;
                 this.user.nbrRates--;
                  }
                })
          
            }else{Swal.fire(
                'Cancelled!',
                '',
                'error'
              )       }
          })          
    },

        Follow(){
          Alert.fire({
            title: 'Are you sure?',
            text: "",
            icon: 'warning', 
            confirmButtonText: 'Yes, follow it!'    
                 
          }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/follow/'+this.$route.params.id).then(response=>{
                  if(response.data.status=="success"){
         Swal.fire(
                'Follow it',
                '',
                'success'
              )             
                 this.user.followed=true;
                 this.user.followers++;
                
                  }
                })
          
            }else{Swal.fire(
                'Cancelled!',
                '',
                'error'
              )       }
          })          
    },



    resetRate(){
          Alert.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning', 
            confirmButtonText: 'Yes, reset it!'    
                 
          }).then((result) => {
            if (result.isConfirmed) {
                axios.delete('/resetRate/'+this.$route.params.id).then(response=>{
                  if(response.data.status=="success"){
                  
                 this.user.rated=false;
                 this.user.rate=0;
                  this.user.nbrRates--;
                  }
                })
          
            }else{Swal.fire(
                'Cancelled!',
                'Your rate has been not reseted :)',
                'error'
              )       }
          })          
    },

     
        },

         created(){
           this.getUserDetails();
         }
        
        }
    
</script>
