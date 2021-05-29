<template>
    <div class="container">
     <div class="container">
    <div class="main-body">
        
    
          <div class="row gutters-sm">
            <div class="col-md-5 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img :src="
                        'http://127.0.0.1:8000/assets/avatars/' + user.avatar" alt="Admin" class="rounded-circle" width="200" height="200">
                    <div class="mt-3">
                      <h4>{{user.name}}</h4>
                     <span  v-if="user.rate >= 0">
                      <span v-for="(index) in 5" :key="index" class="text-secondary mb-1" style="margin:2px">
                        <span v-if="index <= user.rate" class="fa fa-star checked"></span>
                        <span v-else class="fa fa-star"></span>
                      </span>
                     </span>
                      <p class="text-muted font-size-sm">{{user.description}}</p>
                      <button class="btn btn-primary">Follow</button>
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
    </div>
</template>

<script>
    export default {
        data(){
          return{
            user:{
              name:"",
              email:"",
              mobile:"",
              skills:"",
              address:"",
              followers:"",
              rate:"",
              description:"",
              avatar:"",
              

            }

          }
        },

        methods: {
          getUserDetails(){
            axios.get("/userDetails/"+this.$route.params.id).then(response=>{
              this.user=response.data.data;
            })},
         },

         created(){
           this.getUserDetails();
         }
        
        }
    
</script>
