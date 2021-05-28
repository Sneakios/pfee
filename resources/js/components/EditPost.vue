<template>
  <div> 
      <!-- Button trigger modal -->
      <button style="border-radius: 5px;margin-left:5px;font-size:15px;background-color:green;border: 2px green solid;color:white;font-size:13px;font-weight:600"
        data-toggle="modal"
        data-target="#EditModal" >
        <i style="font-size:15px;weight:600" class="fa fa-edit"></i> Edit
      </button>
   
    <!-- Modal -->
    <div
      class="modal fade"
      id="EditModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="EditPost">
            <div class="modal-body">
              <div class="form-group">
                <div class="form-group col-md-12">
                  <textarea
                    :class="['form-control', errors.body ? 'is-invalid' : '']"
                    v-model="dbody"
                    placeholder="body ..."
                    required
                  ></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Close
              </button>
              <input type="submit" value="Save" class="btn btn-success" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props: ['body','id'],
  data() {
      
    return {
      dbody:this.body,
      did:this.id,
      errors: []
    };
  },


  methods: {
      EditPost() {
     
      Alert.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',     
            confirmButtonText: 'Yes, change it!'    
          }).then((result) => {
            if (result.isConfirmed) {
               axios.put("/editMyPost/"+this.did, {
          body: this.dbody,       
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
                'Your post has been changed.',
                'success'
              )  
              
           this.errors = [];
          }
        });
            }else{Swal.fire(
                'Cancelled!',
                'Your post has been not changed :)',
                'error'
              )       }
            })
     
     
    
    }
   
  }
};
</script>
