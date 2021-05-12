<template>
    <div>
                       <div class="modal fade" id="specialty-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h2 class="text-center r">Complete Profile</h2>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>

                                    <div class="modal-body">

                                        <div class="login-form">

                                            <form method="POST" >
                                                <h2 class="text-center cna">Choose Specialty</h2>
                        
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <select id="ville" class="form-control birth" v-model="skills">

                                                            <option value="Baby sitting">Baby Sitting</option>
                                                            <option value="Builder">Building</option>
                                                            <option value="Beauty and well being">Beauty and well being</option>
                                                            <option value="Chouffeur">Chouffeur</option>
                                                            <option value="Delovery">Delovery</option>
                                                            <option value="Painting">Painting</option>
                                                            <option value="Carpenting">Carpenting</option>
                                                            <option value="Animal care">Animal care</option>
                                                            <option value="Electronic repair">Electronic repair</option>
                                                            <option value="Kebili">Housework and cleaning</option>
                                                      
                                                            

                                                        </select>
                                                    </div>                        
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group col-md-12">
                                                    <textarea id="description" name="description"  class="form-control" placeholder="description !!" v-model="description">
                                                    </textarea>
                                                    </div>
                                                
                                                    </div>
                                                      <div class="form-group row mb-0">
                                                     <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                        Save Settings
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 offset-md-4" >
                        <button type="button" style="border-radius: 5px;margin:5px;font-size:15px;background-color:red;border: 2px red solid;color:white;font-size:13px;font-weight:600;width:100px"  data-toggle="modal" data-target="#specialty-modal">
                         <svg  style="margin-bottom:3px;" height="16" viewBox="0 0 16 16" version="1.1" width="16" aria-hidden="true"><path style="fill:white" fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"></path></svg>  Complete    </button>
                    </div>
    </div>
    
</template>

<script>
    export default {
      
           
             data(){
        return {
         
           skills:'Chouffeur',
            description:'',



        }
    }
        
    }
</script>
