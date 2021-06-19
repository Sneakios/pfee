<template>
  <section id="portfolio" class="portfolio">
    <div class="container">
      <div class="section-title">
        <span>Portfolio</span>
        <h2>Portfolio</h2>
        <p>
          Here are some of our recent projects from a variety of industries we
          serve.
        </p>
      </div>

      <div class="row portfolio-container">
        <div
          class="col-lg-4 col-md-6 portfolio-item filter-app"
          v-for="portfolio in portfolios"
          :key="portfolio.id"
          style="box-shadow: 10px 5px 5px grey;"
        >
          <div class="portfolio-wrap">
            <img
             :src="'http://127.0.0.1:8000/assets/avatars/' + portfolio.picture"
              class="img-fluid"
              style="height:200px;"
              alt=""
            />
            <div class="portfolio-info">
            <button class="btn btn-danger" style="font-size:15px;border-radius:50%" @click="DeleteProject(portfolio.id)"><i class="fa fa-trash"></i></button>
              <h4>{{portfolio.title}}</h4>
              
              <div class="portfolio-links">
                <a
                  :href="'http://127.0.0.1:8000/assets/avatars/' + portfolio.picture"
                  data-gallery="portfolioGallery"
                  class="portfolio-lightbox"
                  title="App 1"
                  ><i class="ri-add-fill"></i
                ></a>
              <router-link :to="'/home/PortfolioDetails/' + portfolio.id"><i class="ri-links-fill"></i
                ></router-link>               
              </div>
            </div>
          </div>
        </div>
      </div>
    

      <form @submit.prevent="SavePortFolio" enctype="multipart/form-data" style="border:dashed 1px blue;border-radius:20px;padding:30px;">
          <div class="section-title">
        <span >Add Projects</span>
        <h2 style="color:skyblue">Add Projects</h2>
      
      </div>
        
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group col-md-12">
              <input
                style="margin:10px;"
                id="title"
                type="text"
                class="form-control"
                :class="['form-control', errors.title ? 'is-invalid' : '']"
                required
                autofocus
                placeholder="title .."
                v-model="title"
              />
              <textarea
                style="margin:10px;"
                :class="[
                  'form-control',
                  errors.description ? 'is-invalid' : ''
                ]"
                v-model="description"
                placeholder="description ..."
                required
              ></textarea>
              <input
                if="picture"
                type="file"
                :class="['form-control', errors.picture ? 'is-invalid' : '']"
                @change="handleOnchange"
                style="margin:10px;"
                id="picture"
                name="picture"
              />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input
            type="submit"
            value="SAVE"
            class="btn btn-primary"
            name="picture"
          />
        </div>
      </form>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      title: "",
      file: "",
      description: "",
      errors: [],
           
           portfolios:{
             id:"",
             title:"",
             picture:"",
           }

    };
  },

  methods: {
    handleOnchange(e) {
      this.file = e.target.files[0];
    },
    SavePortFolio() {
      Alert.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        confirmButtonText: "Yes, added it!"
      }).then(result => {
        if (result.isConfirmed) {
          const formData = new FormData();
          formData.set("picture", this.file);
          formData.set("description", this.description);
          formData.set("title", this.title);
          axios.post("/savePortFolio", formData).then(response => {
            if (response.data.status == "success") {
              Swal.fire("Succes!", "Your project has been added.", "success");
              this.errors = [];

              this.title = "";
              this.description = "";
              this.picture = "";
            } else if (response.data.status == "error") {
              this.errors = response.data.errors;
              Swal.fire("error!", "missong information.", "error");
              this.errors = [];

              this.title = "";
              this.description = "";
              this.picture = "";
            }
          });
        } else {
          Swal.fire(
            "Cancelled!",
            "Your project has been not added :)",
            "error"
          );
        }
      });
    },
      getPortfolios() {
      axios.get("/getPortfolios/" ).then(response => {
        this.portfolios = response.data.portfolios;
      });
    },

    DeleteProject(id){
      Alert.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning', 
            confirmButtonText: 'Yes, delete it!'    
                 
          }).then((result) => {
            if (result.isConfirmed) {
                axios.delete('/deleteProject/'+id).then(response=>{
                  if(response.data.status=="success"){
         Swal.fire(
                'Deleted!',
                'Your project has been deleted.',
                'success'
              )             
                  for(var i=0; i < this.portfolios.length; i++) {
                    if(this.portfolios[i].id == id)
                    {
                        this.portfolios.splice(i,1);
                    } }
                  }
                })
          
            }else{Swal.fire(
                'Cancelled!',
                'Your project has been not deleted :)',
                'error'
              )       }
          })          
    },
  },

   created() {
    this. getPortfolios()
  }

  
};
</script>

<style>




</style>