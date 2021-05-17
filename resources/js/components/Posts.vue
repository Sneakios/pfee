<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header form-row"><div class="form-group col-md-9"></div><div class="form-group col-md-3"><add-post></add-post></div></div>
                      
                    <div class="card-body">
                      <div class="media simple-post" style="margin:10px" v-for="post in posts" :key="post.id">
                        <div class="media-body" style="margin-left:1px">  
                         <div class="form-row" style="width:290px;height:60px;border:1px solid white">
                            <div class="form-group col-md-2" style="margin-left:1px;border:1px solid white">
                                <img :src="'http://127.0.0.1:8000/assets/avatars/'+post.avatar" style="height:45px;width:45px;border-radius: 40px;border:px solid #0080ff">
                            </div>
                            <div class="form-group col-md-4;border:1px solid white">
                              <div class="form-group">
                                <div>
                                 <strong class="text-primary" style="margin-left:1px"> {{post.user}}</strong><br>  
                                </div>
                                <div style="margin-left:5px">
                                <span>  <i class="fa fa-calendar"></i> {{post.date}}</span>
                                </div>
                              </div>
                              </div>
                        </div>  
                            
                         <b>
                            {{post.body}}
                           </b>
                            <ul class="list-inline list-unstyled d-flex post-info">
                                
                                <router-link :to="'/home/PostDetails/'+post.id"><span ><i class="fa fa-comment"></i> {{post.cmntsNbr}}</span></router-link>
                                </ul>
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
          posts:{
              id:'',
              body:'',
              user:'',
              cmntsNbr:'',
              date:'',
              avatar:'',
              
          }
            }
        },

        methods: {
   
            getPosts(){
                axios.get('/getPosts').then(response=>{
                  this.posts=response.data.data                 
                })                
            },
            doSomething(){
                alert("fathy")
            }
        },
        created(){
            this.getPosts();
        }
    }
</script>
