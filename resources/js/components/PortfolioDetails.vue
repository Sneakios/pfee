<template>
<div>
    <div class="container">
   
                 
                      <h1 class="mt-4">{{project.title}}</h1>
                 
                
                
                    <p>Posted on <strong class="badge badge-primary p-1">{{project.added_at}}</strong></p>
                   
      

        <!-- Title -->

        <!-- Author -->
      

     

        <!-- Date/Time -->

        

        <!-- Preview Image -->

     

        <!-- Post Content -->
     

        <!-- Comments Form -->
       <div class="form-row">
               <div class="form-group col-md-6">
                   <img class="img-fluid rounded" :src="'http://127.0.0.1:8000/assets/avatars/' + project.picture" style="width:300px;max-height:300px" alt="">
                   
                  </div>
                

 <div class="form-group col-md-6">
                       {{project.description}}

                </div>
              </div>
    

        <!-- Single Comment -->
     



      </div>
  </div>
</template>

<script>
    export default {
      data() {
    return {
        project:{
            id:'',
            title:'',
            picture:'',
            description:'',
            added_at:'',
        }
    }},

    methods:{
        getProjectDetails(){
            axios.get('/getPortfolioDetails/'+this.$route.params.id).then(response=>{
                this.project=response.data.data;
            })
        }
    },
     created() {
    this.getProjectDetails()
  }
    }
</script>
