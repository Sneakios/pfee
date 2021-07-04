<template>
    <div class="container">
     
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Name</label>
                  <input
                  v-model="name"
                    type="text"
                    class="form-control"
                    required
                    autocomplete="firstname"
                    autofocus
                   placeholder="name ..."
                  />
                </div>

                <div class="form-group col-md-4">
                  <label>Skills</label>
                     <select v-model="skills" class="form-select birth">
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

                    <div class="form-group col-md-4">
                    <label>City</label>
              <select
                    id="specialty"
                    class="form-select birth"
                   v-model="ville"
                  >
                    <option value="Ariana">Ariana</option>
                    <option value="Beja">Beja</option>
                    <option value="Ben Arous">Ben Arous</option>
                    <option value="Bizerte">Bizerte</option>
                    <option value="Gabes">Gabes</option>
                    <option value="Gafsa">Gafsa</option>
                    <option value="Jendouba">Jandouba</option>
                    <option value="Kairouan">Kairouan</option>
                    <option value="Kasserine">Kasserine</option>
                    <option value="Kebili">Kebili</option>
                    <option value="Le Kef">Le Kef</option>
                    <option value="Mahdia">Mahdia</option>
                    <option value="La Lanouba">La Manouba</option>
                    <option value="Mednine">Mednine</option>
                    <option value="Monastir">Monastir</option>
                    <option value="Sfax">Sfax</option>
                    <option value="Sidi Bouzid">Sidi Bouzid</option>
                    <option value="Seliana">Seliana</option>
                    <option value="Sousse">Sousse</option>
                    <option value="Tataouine">Tataouine</option>
                    <option value="Tozeur">Tozeur</option>
                    <option value="Tunis">Tunis</option>
                    <option value="Zaghouan">Zaghouan</option>
                  </select>
                </div>
              </div>
           <div class="workers">
    <div class="carddd p-3" v-for="worker in  filtredWorkers" :key="worker.id">
        <div class="d-flex align-items-center">
            <div class="image"> <img :src="'http://127.0.0.1:8000/assets/avatars/' + worker.avatar " class="rounded" width="155" height="155"> 
           
                <router-link :to="'/home/UserDetails/'+worker.id"><h6 class="mb-0 mt-0">{{worker.name}}</h6></router-link> 
                <span>{{worker.ville}}</span> | <span>{{worker.skills}}</span>
              
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
             result:[],
             skills:'',
             name:'',
             ville:'',
         }
     },

     methods:{
        getWorkers(){
            axios.get('/getWorkers').then(response=>{
                this.result=response.data.workers;
            })
        }
     },

     computed:{
         filtredWorkers(){
             return this.result.filter((result)=>{
                 return result.name.match(this.name);
             })
         }
     },

     created(){
      this.getWorkers();
     },
    }
</script>


<style>
.carddd {
    box-shadow: 10px 5px 5px grey;
    width: 200px;
    border: none;
    border-radius: 10px;
    background-color: #fff;
     margin:10px
}

.workers
{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;

   

}


</style>