<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Setting</div>

          <div class="card-body">
            <form @submit.prevent="SaveChanges">
              <h2 class="text-center cna">Website Settings</h2>

              <div class="form-row">
                <div class="form-group col-md-6">
                <label class="lab">First Email:</label>
                  <input
                   
                    type="text"
                   :class="['form-control', errors.email1 ? 'is-invalid' : '']"
                   
                    required
                  
                    autofocus
                    placeholder="email 1 ..."
                    v-model="email1"
                  />
                </div>

                <div class="form-group col-md-6">
                <label class="lab">Second Email:</label>
                  <input
                   
                    type="text"
                    :class="['form-control', errors.email2 ? 'is-invalid' : '']"
                
                    required
                  
                    autofocus
                    placeholder="email 2 ..."
                    v-model="email2"
                  
                  />
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                <label class="lab">First Phone:</label>
                  <input
                    type="text"
                   :class="['form-control', errors.mobile1 ? 'is-invalid' : '']"
                   
                    placeholder="mobile 1 ..."
                   
                    required
                    v-model="mobile1"
                   
                  />
                </div>
                <div class="form-group col-md-6">
                <label class="lab">Second Phone:</label>
                  <input
                    type="text"
                   :class="['form-control', errors.mobile2 ? 'is-invalid' : '']"
                   
                    placeholder="mobile 2 ..."
                   
                    required
                    v-model="mobile2"
                   
                  />
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label class="lab">Location:</label>
             <textarea :class="['form-control', errors.location ? 'is-invalid' : '']" v-model="location" placeholder="location ..."></textarea>

                </div>
                <div class="form-group col-md-6"></div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-5">
                  <button type="submit" class="btn btn-primary">
                    Save Changes
                  </button>
                </div>
              </div>
            </form>
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
          
            name:'',
            email1:'',
            email2:'',
            mobile1:'',
            mobile2:'',
            location:'',
            
errors:[],
         

        }
       },

       methods:{
           getSettings(){
               axios.get('/getSettings').then(response=>{
                 this.email1=response.data.data.email1;
                 this.email2=response.data.data.email2;
                 this.mobile1=response.data.data.mobile1;
                 this.mobile2=response.data.data.mobile2;
                  this.location=response.data.data.location;
                })
           },

           SaveChanges(){
             Alert.fire({
            title: 'Are you sure?',
            text: "",
            icon: 'warning',     
            confirmButtonText: 'Yes, save it!'    
          }).then((result) => {
            if (result.isConfirmed) {
          
              
               axios.put('/SaveSettingsChanges',
               {email1:this.email1,
               email2:this.email2,
               mobile1:this.mobile1,
               mobile2:this.mobile2,
               location:this.location,})
        .then(response => {
          if (response.data.status == "error") {
             Toast.fire({
              icon: "error",
              title: "Missing informations !!"
            });
            this.errors = response.data.errors;
          } else if (response.data.status == "success") {
              Swal.fire(
                'Saved!',
                'Your settings has benn changed.',
                'success'
              )  
              
                 
           this.errors = [];
          }
        });
            }else{Swal.fire(
                'Cancelled!',
                '',
                'error'
              ) }
            })
           }
       },



       created(){
           this.getSettings();
       }
    }
</script>

<style>
.lab{
 color:skyblue;
  font-family: SFProText-Medium, Helvetica, Arial, sans-serif;
  font-size: 15px;
  font-weight: normal;
  line-height: 20px;
  margin-top: 2px;
  margin-left: 5px;
  font-weight: bold;
}
</style>
