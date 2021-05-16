<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header form-row"><div class="form-group col-md-9"></div><div class="form-group col-md-3"><add-post></add-post></div></div>
                      
                    <div class="card-body">
                      <div class="media simple-post" style="margin:10px" v-for="post in posts" :key="post.id">
                        <div class="media-body">        
                            {{post.body}}
                            <ul class="list-inline list-unstyled d-flex post-info">
                                <li><span><i class="fa fa-user"></i> posted by : <strong class="text-primary">{{post.user}}</strong> </span></li>
                                <li>|</li>
                                <li><span><i class="fa fa-calendar"></i>{{post.date}}</span></li>
                                <li>|</li>
                                <span><i class="fa fa-comment"></i> {{post.cmntsNbr}}</span>
                                </ul>
                                </div>
        
                    </div></div>
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
              body:'',
              user:'',
              cmntsNbr:'',
              date:'',
          }
            }
        },

        methods: {
   
            getPosts(){
                axios.get('/getPosts').then(response=>{
                  this.posts=response.data.data;
                 

                })

                
            }

        },
        created(){
            this.getPosts();
        }
    }
</script>
