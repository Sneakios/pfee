<template>
  <div class="container">
    <div class="media simple-post" style="margin:10px">
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
              :src="'http://127.0.0.1:8000/assets/avatars/' + post.avatar"
              style="height:45px;width:45px;border-radius: 40px;border:px solid #0080ff"
            />
          </div>
          <div class="form-group col-md-4;border:1px solid white">
            <div class="form-group">
              <div>
                <strong class="text-primary" style="margin-left:1px">
                  {{ post.user }}</strong
                ><br />
              </div>
              <div style="margin-left:5px">
                <span> <i class="fa fa-calendar"></i> {{ post.date }}</span>
              </div>
            </div>
          </div>
        </div>

        <b>
          {{ post.body }}
        </b>
        <ul class="list-inline list-unstyled d-flex post-info">
          <span><i class="fa fa-comment"></i> {{ post.cmntsNbr }}</span>
        </ul>
      </div>
    </div>
    <div class="card my-4">
      <h5 class="card-header">Leave a Comment:</h5>
      <div class="card-body">
        <form @submit.prevent="addComment">
          <input type="hidden" name="" />
          <div class="form-group">
            <textarea
              :class="['form-control', this.errors.body ? 'is-invalid' : '']"
              rows="3"
              v-model="comment.body"
              required
            ></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
      </div>
    </div>
    <div class="media mb-4" v-for="(comment,index) in comments" :key="index">
      <div class="media mb-4">
      
        <img
          class="d-flex mr-3 rounded-circle"
          :src="'http://127.0.0.1:8000/assets/avatars/' + comment.avatar"
          style="height:50px;width:50px"
          alt=""
        />
        <div class="media-body">
                  <strong class="text-primary"> {{ comment.user }}</strong>
                  <span v-if="comment.me && !comment.edit"> <button style="border-radius: 5px;margin-left:5px;font-size:15px;background-color:green;border: 2px green solid;color:white;font-size:13px;font-weight:600" @click="editMyComment(comment.id)"><i style="font-size:15px;weight:600" class="fa fa-edit red"></i></button></span>              
                 <span v-if="comment.me && !comment.edit"> <button style="border-radius: 5px;margin-left:5px;font-size:15px;background-color:red;border: 2px red solid;color:white;font-size:13px;font-weight:600" @click="deleteMyComment(comment.id)"><i style="font-size:15px;weight:600" class="fa fa-trash red"></i></button> </span>  
                  
                  <br>               
             
                   <form @submit.prevent="SaveCommentEdit(comment.id,index)" v-if="comment.edit">
                    <input type="hidden" name="" />
                    <div class="form-group">
                      <textarea
                         :class="['form-control', errors.body ? 'is-invalid' : '']"
                        rows="3"
                        v-model="comment.body"
                        required  
                        cols="100"                     
                      ></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </form>
              <b v-if="!comment.edit" >{{ comment.body }} </b><br />
                 <span> <i class="fa fa-calendar"></i> {{ comment.date }}</span>  
           
         
         
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
 
  data() {
    return {
      errors: [],
      post: {
        id: "",
        body: "",
        user: "",
        cmntsNbr: "",
        date: "",
        avatar: ""
      },
      comments: {
        id:"",
        avatar: "",
        body: "",
        user: "",
        date: "",
        me:"",
        edit:""
      },
      comment: {
        user: "",
        body: "",
        date: "",
        avatar: "",
        edit:""
      }
    };
  },

  methods: {
    getPostDetails() {
      axios.get("/getPostDetails/" + this.$route.params.id).then(response => {
        this.post = response.data.post;
      });
    },
    editMyComment(id){
            for(var i=0; i < this.comments.length; i++) {
                    if(this.comments[i].id == id)
                    {
                        this.comments[i].edit=true;
                    } }
                  },

    addComment() {
      axios
        .post("/addComment/" + this.$route.params.id, {
          body: this.comment.body
        })
        .then(response => {
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
            this.errors = [];
            this.comment.body = "";
            this.comments.push(response.data.cmnt);
           this.post.cmntsNbr++;
          }
        });
    },

    getComments() {
      axios.get("/getComments/" + this.$route.params.id).then(response => {
        this.comments = response.data.comments;
      });
    },
    
    deleteMyComment(id){
      Alert.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning', 
            confirmButtonText: 'Yes, delete it!'    
                 
          }).then((result) => {
            if (result.isConfirmed) {
                axios.delete('/deleteMyComment/'+id).then(response=>{
                  if(response.data.status=="success"){
         Swal.fire(
                'Deleted!',
                'Your comment has been deleted.',
                'success'
              )             
                  for(var i=0; i < this.comments.length; i++) {
                    if(this.comments[i].id == id)
                    {
                        this.comments.splice(i,1);
                    } }
                  }
                })
          
            }else{Swal.fire(
                'Cancelled!',
                'Your comment has been not deleted :)',
                'error'
              )       }
          })          
    },


      SaveCommentEdit(did,indexx) {     
      Alert.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',     
            confirmButtonText: 'Yes, change it!'    
          }).then((result) => {
            if (result.isConfirmed) {
               axios.put("/editMyComment/"+did, {
          body: this.comments[indexx].body,       
        })
        .then(response => {
          if (response.data.status == "error") {
             Toast.fire({
              icon: "error",
              title: "too short !!"
            });
            this.errors = response.data.errors;
          } else if (response.data.status == "success") {
              Swal.fire(
                'Saved!',
                'Your comment has been changed.',
                'success'
              )          
              for(var i=0; i < this.comments.length; i++) {
                    if(this.comments[i].id == did)
                    {
                        this.comments[i].edit=false;

                    } }      
           this.errors = [];
          }
        });
            }else{Swal.fire(
                'Cancelled!',
                'Your comment has been not changed :)',
                'error'
              )       }
            })
     
     
    
    }
    
  },
  created() {
    this.getPostDetails();
    this.getComments();
  }
};
</script>
