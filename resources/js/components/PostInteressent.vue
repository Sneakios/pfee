<template>
  <div class="container" >
    <div class="row justify-content-center">
      <div class="col-md-12">
       
          <div class="form-row">
            <div class="form-group col-md-9"></div>
            <div class="form-group col-md-3"><add-post></add-post></div>
          </div>

          <div class="card-body">
            <div class="media simple-post"  style="margin:10px" v-for="post in posts" :key="post.id">
              <div class="media-body" style="margin-left:1px">
                <div class="form-row" style="width:290px;height:60px;border:1px solid white" >
                  <div class="form-group col-md-2" style="margin-left:1px;border:1px solid white"  >
                    <img :src="'http://127.0.0.1:8000/assets/avatars/' + post.avatar " style="height:45px;width:45px;border-radius: 40px;border:px solid #0080ff"/>
                  </div>
                  <div class="form-group col-md-4;border:1px solid white">
                    <div class="form-group">
                      <div>
                        <strong class="text-primary" style="margin-left:1px">
                          <router-link :to="'/home/UserDetails/'+post.user_id">{{ post.user }}</router-link></strong
                        ><br />
                      </div>
                      <div style="margin-left:5px">
                        <span>
                          <i class="fa fa-calendar"></i> {{ post.date }}</span
                        >
                      </div>
                    </div>
                  </div>                
                </div>
               <b>
                  {{ post.body }}
                </b>
                <ul class="list-inline list-unstyled d-flex post-info">
                <li> <router-link :to="'/home/PostDetails/' + post.id"><span><i class="fa fa-comment"></i> {{ post.cmntsNbr }}</span></router-link>  </li>                               
                <li> <button style="border-radius: 5px;margin-left:5px;font-size:15px;background-color:red;border: 2px red solid;color:white;font-size:13px;font-weight:600" @click="deleteInterPost(post.id)"><i style="font-size:15px;weight:600" class="fa fa-trash red"></i> Delete</button></li>
                          
                </ul>
              </div>
            </div>
          </div>
       
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    
    return {
     
      posts: {
        user_id:"",
        id: "",
        body: "",
        user: "",
        cmntsNbr: "",
        date: "",
        avatar: ""
      }
    };
  },

  methods: {
    getInteressentPosts() {
      axios.get("/getInteressentPosts").then(response => {
        this.posts = response.data.data;
      });
    },

    deleteInterPost(id){
      Alert.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',    
            confirmButtonText: 'Yes, delete it!' 
                 
          }).then((result) => {
            if (result.isConfirmed) {
                axios.delete('/unInteressentPost/'+id).then(response=>{
                  if(response.data.status=="success"){
         Swal.fire(
                'Deleted!',
                'Your post has been deleted.',
                'success'
              )             
                  for(var i=0; i < this.posts.length; i++) {
                    if(this.posts[i].id == id)
                    {
                        this.posts.splice(i,1);
                    } }
                  }
                })
          
            }else{Swal.fire(
                'Cancelled!',
                'Your post has not been deleted :)',
                'error'
              )       }
          })          
    }  
  },
  created() {
    this.getInteressentPosts();
  }
};
</script>
