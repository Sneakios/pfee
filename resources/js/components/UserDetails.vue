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
                            <star-rating v-model="user.rate" :rating="user.rate" :itemSize="40" :showRating="false" :readOnly="user.rated" @rating-selected="setRate" ></star-rating>
                            
                            <div><a href="#" @click.prevent="resetRate">Reset Rating</a></div> 
                          </div>
                    </span>
                     <p class="text-muted font-size-sm">{{user.description}}</p>
                      <button class="btn btn-primary" @click.prevent="Follow" v-if="!user.followed"><i class="fa fa-plus"  style="font-size:15px;weight:600"></i> Follow</button>
                      <button class="btn btn-success" v-if="user.followed" @click.prevent="Unfollow"><i class="fa fa-check" style="font-size:15px;weight:600"></i> Unfollow</button>
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
                      <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{user.name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{user.email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      +216 {{user.mobile}}
                    </div>
                  </div>
                  <hr>
                  <div class="row" v-if="user.skills != ''">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Skills</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{user.skills}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{user.address}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
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
