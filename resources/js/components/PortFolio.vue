<template>
    <section id="portfolio" class="portfolio">
     
      <div class="container">
    

        <div class="section-title">
          <span>Portfolio</span>
          <h2>Portfolio</h2>
          <p>Here are some of our recent projects from a variety of industries we serve.</p>
        </div>

     

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app" v-for="(index) in 9" :key="index">
            <div class="portfolio-wrap">
              <img src="http://127.0.0.1:8000/assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="http://127.0.0.1:8000/assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="ri-add-fill"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="ri-links-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

    


        </div>
          <div class="section-title">
          <span>Add Projects</span>
          <h2>Add Projects</h2>
          <p>Here you add your projects.</p>
        </div>


         <form @submit.prevent="SavePortFolio" enctype="multipart/form-data">
            <div class="modal-body" >
              <div class="form-group">
                <div class="form-group col-md-12">
                   <input style="margin:10px;"
                    id="title"
                    type="text"
                    class="form-control"
                    :class="[
                      'form-control',
                      errors.title ? 'is-invalid' : ''
                    ]"
                    required
                   
                    autofocus
                    placeholder="title .."
                    v-model="title"/>
                  <textarea style="margin:10px;"
                    :class="['form-control', errors.description ? 'is-invalid' : '']"
                    v-model="description"
                    placeholder="description ..."
                    required
                  ></textarea>
                  <input if="picture" type="file" :class="['form-control', errors.picture ? 'is-invalid' : '']" @change="changeImage" style="margin:10px;" id="picture" name="picture">

                </div>
              </div>
            </div>
            <div class="modal-footer">
         
              <input type="submit" value="SAVE"   class="btn btn-success" name="picture"/>
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
      
      file: '',
      description: "",
      errors: []
    };
  },

  methods: {
    changeImage(e){
    this.file = e.target.files[0];
    },
    SavePortFolio() {
      axios
        .post("/savePortFolio",{title:this.title,picture:this.picture,description:this.description})
        .then(response => {
          if (response.data.status == "error") {
            this.errors = response.data.errors;
            Toast.fire({
              icon: "error",
              title: "missing information !! try again"
            });
          } else if (response.data.status == "success") {
            Toast.fire({
              icon: "success",
              title: "Saved  successfully"
            });
            this.errors = [];

            this.title = "";
            this.description= "";
           this.picture="";

          }
        });
    }
  }
    }
</script>