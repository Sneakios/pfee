<template>
     <div>
    <div class="col-md-4 offset-md-4">
      <!-- Button trigger modal -->
      <button 
       style="border-radius: 5px;font-size:15px;background-color:#0000FF;border: 2px #0000FF solid;color:white;font-size:13px;font-weight:600;width:100px;"
         data-toggle="modal"
        data-target="#exampleModal">
       <b>+</b> Create Post
      </button>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
           <form @submit.prevent="savePost">
            <div class="modal-body">
              <div class="form-group">
                <div class="form-group col-md-12">
                 <textarea  :class="['form-control',errors.body ? 'is-invalid' : '']" v-model="body" placeholder="body ..." required></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Close
              </button>
              <input type="submit" value="POST" class="btn btn-success">

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
   export default {
        data(){
            return{
              
                body:'',
                errors:[],
            }
        },

        methods: {
            savePost(){
                axios.post('/savePost',{title:this.title,body:this.body}).then(response=>{
                    if (response.data.status == "error") {
            this.errors = response.data.errors;
            Toast.fire({
              icon: "error",
              title: "to short !! try again"
            });
          } else if (response.data.status == "success") {
            Toast.fire({
              icon: "success",
              title: "Post saved in successfully"
            });
            this.errors=[];
          
           this.body='';
          }
                })
            }
        },
    }
</script>
