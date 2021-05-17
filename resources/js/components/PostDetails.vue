<template>
  <div class="container">
    <div
      class="media simple-post"
      style="margin:10px"
      
    >
      <div class="media-body" style="margin-left:1px">
        <div
          class="form-row"
          style="width:290px;height:60px;border:1px solid white"
        >
          <div
            class="form-group col-md-2"
            style="margin-left:1px;border:1px solid white"
          >
            <img
              :src="'http://127.0.0.1:8000/assets/avatars/'+post.avatar"
              style="height:45px;width:45px;border-radius: 40px;border:px solid #0080ff"
            />
          </div>
          <div class="form-group col-md-4;border:1px solid white">
            <div class="form-group">
              <div>
                <strong class="text-primary" style="margin-left:1px">
                  {{post.user}}</strong
                ><br />
              </div>
              <div style="margin-left:5px">
                <span> <i class="fa fa-calendar"></i> {{post.date}}</span>
              </div>
            </div>
          </div>
        </div>

        <b>
          {{post.body}}
        </b>
        <ul class="list-inline list-unstyled d-flex post-info">
          <span><i class="fa fa-comment"></i> {{post.cmntsNbr}}</span>
        </ul>
      </div>
    </div>
    <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form @submit.prevent="addComment">
              <input type="hidden" name="" >
              <div class="form-group">
                <textarea :class="['form-control',this.errors.body ? 'is-invalid' : '']" rows="3" v-model="comment.body" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary" >Add Comment</button>
            </form>
          </div>
        </div>
        <div class="media mb-4" v-for="comment in comments" :key="comment.id">
           <div class="media mb-4" >
          <img class="d-flex mr-3 rounded-circle" :src="'http://127.0.0.1:8000/assets/avatars/'+comment.avatar"  style="height:50px;width:50px" alt="">
          <div class="media-body">
            <strong class="text-primary" > {{comment.user}}</strong><br>
            {{comment.body}} <br>
            <span> <i class="fa fa-calendar"></i> {{comment.date}}</span>
          </div>
        </div>
        </div>
</div>
</template>

<script>
export default {
 data(){
            return{
                errors:[],
          post:{
              id:'',
              body:'',
              user:'',
              cmntsNbr:'',
              date:'',
              avatar:'',             
          },
            comments:{
              avatar:'',
              body:'',
              user:'',
              date:'',         
          },
          comment:{
              user:'',
              body:'',
              date:'',
              avatar:'',
          }
        
            }


        },

        methods: {
            getPostDetails(){
                axios.get('/getPostDetails/'+this.$route.params.id).then(response=>{
                    this.post=response.data.post;
                })
            },

            addComment(){
                axios.post('/addComment/'+this.$route.params.id,{body:this.comment.body}).then(response=>{
      if (response.data.status == "error") {
            this.errors = response.data.errors;
            Toast.fire({
              icon: "error",
              title: "too short !! try again"
            });
          } else if (response.data.status == "success") {
            Toast.fire({
              icon: "success",
              title: "Comments added  successfully"
            });
            this.errors=[];
           this.comment.body='';
                     this.comments.push(response.data.cmnt);

          }
                })
            },

            getComments(){
                 axios.get('/getComments/'+this.$route.params.id,).then(response=>{
                     this.comments=response.data.comments;
                 })
            

            }
        },
        created(){
            
            this.getPostDetails();
            this.getComments();
 }
};
</script>
